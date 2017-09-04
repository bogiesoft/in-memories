<?php

namespace app\controllers;

use Yii;
use app\components\MyController;
use app\models\ExpendModel;
use app\models\ExpendSearchModel;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use app\models\TagsModel;
use yii\web\NotFoundHttpException;
use app\models\TagsCustomModel;
use app\models\TagsCustomSearchModel;
use yii\web\ForbiddenHttpException;

class ExpendController extends MyController
{
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::className(),
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
                'only' => ['getdata'],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    public function beforeAction($action)
    {
        if(!$this->checkPermissionRank('expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $this->enableCsrfValidation = false;
        
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $this->isLogin();
        $tagModel = TagsModel::getTagListByName('expend');
        $tags_custom = TagsCustomModel::getTagListByName('expend');
        if(count($tags_custom)>0){
            $tagModel = array_merge($tagModel,$tags_custom);
        }
        foreach ($tagModel as $key => $row) {
            //
            $tags[$key] = $row['name'];
        }
        $date_from = date('Y-m-d');
        $date_to = date('Y-m-d');
        $min_price = 0;
        $max_price = 50000;
        $status = [1,-1];
        
        if(Yii::$app->request->get('date')){
            $date_from = Yii::$app->request->get('date');
            $date_to = Yii::$app->request->get('date');
        }
        
        if(Yii::$app->request->post()){
            if(isset(Yii::$app->request->post()['date_range_from']) && isset(Yii::$app->request->post()['date_range_to'])){
                $date_from = Yii::$app->request->post()['date_range_from'];
                $date_to = Yii::$app->request->post()['date_range_to'];
            }

            if(isset(Yii::$app->request->post()['tags'])){
                $tags = Yii::$app->request->post()['tags'];
            }
            else{
                $tags = [null];
            }
            if(isset(Yii::$app->request->post()['expend-status'])){
                $status = Yii::$app->request->post()['expend-status'];
            }
            else{
                $status = [null];
            }
            if(isset(Yii::$app->request->post()['min_price'])){
                $min_price = Yii::$app->request->post()['min_price'];
            }
            if(isset(Yii::$app->request->post()['max_price'])){
                $max_price = Yii::$app->request->post()['max_price'];
            }
        }
        
        $searchModel = new ExpendSearchModel();
        $dataProvider = $searchModel->searchByFilter(Yii::$app->request->queryParams, $tags, $date_from, $date_to, $min_price, $max_price, $status);
        
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'tagModel' => $tagModel,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'tags' => $tags,
            'status' => $status,
            'min_price' => $min_price,
            'max_price' => $max_price,
        ]);
    }
    
    public function actionManage()
    {
        $this->isLogin();
        if(!Yii::$app->request->get('sort')){
            return $this->redirect([Yii::$app->seo->getUrl('expend/manage').'?sort=-date']);
        }
        $searchModel = new ExpendSearchModel();
        $dataProvider = $searchModel->searchByUser(Yii::$app->request->queryParams);

        return $this->render('manage', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreate()
    {
        $this->isLogin();
        $model = new ExpendModel();
        $tags = TagsModel::findDataTags('expend', null);
        $tags_custom = TagsCustomModel::findDataTagsByUser('expend');
        if(count($tags_custom)>0){
            $tags = array_merge($tags,$tags_custom);
        }
        $model->date = date('Y-m-d');
        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->id;
            
            //$key = implode(',', $model->tags);
            //$model->tag = $key;

            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('expend/manage')]);
            }
        }
            return $this->render('create', [
                'model' => $model,
                'tags' => $tags,
            ]);
        
    }
    public function actionUpdate($id)
    {
        $this->isLogin();
        $model = $this->findNoteModel($id);
        $tags = TagsModel::findDataTags('expend', null);
        $tags_custom = TagsCustomModel::findDataTagsByUser('expend');
        if(count($tags_custom)>0){
            $tags = array_merge($tags,$tags_custom);
        }
        if ($model->load(Yii::$app->request->post())) {
            //$key = implode(',', $model->tags);
            //$model->tag = $key;
            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('expend/manage')]);
            }
        }
            return $this->render('update', [
                'model' => $model,
                'tags' => $tags,
            ]);
        
    }
    
    public function actionDelete($id)
    {
        $this->isLogin();
        $model = $this->findNoteModel($id);
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        else{
            $model->delete();
        }
        return $this->redirect([Yii::$app->seo->getUrl('expend/manage')]);
    }
    protected function findNoteModel($id)
    {
        if (($model = ExpendModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetdata() {
        /*if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }*/
        if(Yii::$app->request->post() && Yii::$app->request->post()['date']){
            $date = Yii::$app->request->post()['date'];
            $model = ExpendModel::find()->where(['id_user'=>Yii::$app->user->id,'date'=>$date])->all();
            if($model){
                foreach ($model as $row) {
                    if($row->tag){
                        $row->tag = TagsModel::getTagName($row->tag);
                    }
                }
                
                return $model;
            }
            else{
                return 1;
            }
            
        }
        return 0;
    }
    
    public function actionTags() {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $tags = TagsModel::find()->where(['parent_id'=>0])->all();
        $searchModel = new TagsCustomSearchModel();
        $dataProvider = $searchModel->searchByUser(Yii::$app->request->queryParams);

        return $this->render('tags/index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tags' => $tags,
        ]);
    }
    public function actionCreatetags() {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $model = new TagsCustomModel();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->id;
            $model->category = 'expend';
            $model->parent_id = 0;
            $model->child = 0;
            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('expend/tags')]);
            }
        } else {
            return $this->render('tags/create', [
                'model' => $model,
            ]);
        }
    }
    public function actionTagsupdate($id) {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $model = $this->findTagsCustomModel($id);
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([Yii::$app->seo->getUrl('expend/tags')]);
        } else {
            return $this->render('tags/update', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionTagschild($id) {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $parent = $this->findTagsCustomModel($id);
        if(!$this->checkPermission($parent->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $searchModel = new TagsCustomSearchModel();
        $dataProvider = $searchModel->searchBychild(Yii::$app->request->queryParams, $id);

        return $this->render('tags/child', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'parent' => $parent,
        ]);
    }
    
    public function actionCreatetagschild($id) {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $parent = $this->findTagsCustomModel($id);
        if(!$this->checkPermission($parent->id_user) || !$this->checkParent($parent)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $model = new TagsCustomModel();
        

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->id;
            $model->category = 'expend';
            $model->parent_id = $id;
            $model->child = 0;
            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('expend/tagschild').'/'.$id]);
            }
        } else {
            return $this->render('tags/createchild', [
                'model' => $model,
                'parent' => $parent,
            ]);
        }
    }
    public function actionTagsupdatechild($id) {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $model = $this->findTagsCustomModel($id);
        if(!$this->checkPermission($model->id_user) || $this->checkParent($model)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect([Yii::$app->seo->getUrl('expend/tagschild').'/'.$id]);
        } else {
            return $this->render('tags/updatechild', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionTagsdelete($id)
    {
        $this->isLogin();
        if(!$this->checkPermissionRank('add-list-expend')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $model = $this->findTagsCustomModel($id);
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        else{
            if($model->delete()){
                return 1;
            }
        }
        return 0;
    }
    
    protected function findTagsCustomModel($id)
    {
        if (($model = TagsCustomModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function checkParent($model) {
        if($model->parent_id ==0){
            return true;
        }
        return FALSE;
    }

}
