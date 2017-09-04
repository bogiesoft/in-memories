<?php

namespace app\controllers;

use Yii;
use app\components\MyController;
use yii\filters\VerbFilter;
use app\models\UserModel;
use app\models\LogGameModel;
use app\models\LogZenyModel;
use app\models\RePasswordPersonal;
use yii\imagine\Image;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use app\models\PersonalMessagesModel;
use app\models\PersonalMessagesSearchModel;
use yii\db\Query;
use app\models\RankModel;
use yii\web\ForbiddenHttpException;

class PersonalController extends MyController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest){
            return $this->redirect(Yii::$app->seo->getUrl('site/login'));
        }
        $this->enableCsrfValidation = false;
        
        return parent::beforeAction($action);
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

    public function actionIndex()
    {
        $modelUser = UserModel::findOne(Yii::$app->user->id);
        $modelGame = LogGameModel::find()->where(['id_user' => Yii::$app->user->id])->all();
        $modelZeny = LogZenyModel::find()->where(['id_user' => Yii::$app->user->id])->all();
        $rank = RankModel::findOne($modelUser->id_rank);

        return $this->render('index', [
            'modelUser' => $modelUser,
            'modelGame' => $modelGame,
            'modelZeny' => $modelZeny,
            'rank' => $rank,
        ]);
    }
    
    public function actionPhoto() {
        if(!$this->checkPermissionRank('img-profile')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $upload = null;
        $model = UserModel::findOne(Yii::$app->user->id);

        if(Yii::$app->request->post()){
            
            $upload = 'profile';

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if (isset($model->imageFile)) {
                $oldName = $model->image;
                $path = '/uploads/img/profile/memo/';
                $name = date('Ymd-his') . '-' . $model->imageFile->name;
                $model->image = $path.$name;

                if ($model->save()) {
                    
                    $model->upload($path, $name);
                    if($oldName || $oldName != ''){
                        $model->delImage($oldName);
                    }
                }
            }
            
        }
        return $this->render('photo', [
            'model' => $model,
            'upload' => $upload,
            'img' => $model->image,
        ]);
    }
    
    public function actionCropimg() {
        if(!$this->checkPermissionRank('img-profile')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }

        if(Yii::$app->request->post()){
            
            $x = Yii::$app->request->post()['x'];
            $y = Yii::$app->request->post()['y'];
            $width = Yii::$app->request->post()['width'];
            $height = Yii::$app->request->post()['height'];
            $pic = Yii::$app->request->post()['pic'];

            $name = '/uploads/img/profile/' . date('Ymd-his') . '-' . Yii::$app->user->id.'.jpg';

            Image::crop(Yii::$app->basePath.'/web'.$pic , $width, $height, [$x, $y])
                ->save(Yii::getAlias('@webroot'.$name), ['quality' => 80]);
            
            $model = UserModel::findOne(Yii::$app->user->id);
            if($model->image_crop || $model->image_crop != ''){
                $model->delImage($model->image_crop);
            }
            $model->image_crop = $name;
            $model->updated_at = time();
            if($model->save()){
                $model->delImage($model->image);
                return 1;
            }
        }
        return 0;
    }
    
    public function actionEditprofile() {
        $permission = FALSE;
        if($this->checkPermissionRank('nickname')){
            $permission = true;
        }
        $modelUser = UserModel::findOne(Yii::$app->user->id);
        $rank = RankModel::findOne($modelUser->id_rank);
        if($modelUser->load(Yii::$app->request->post())){
            
            $modelUser->updated_at = time();
            $modelUser->save();
        }

        return $this->render('editprofile', [
            'modelUser' => $modelUser,
            'rank' => $rank,
            'permission' => $permission,
        ]);

    }
    public function actionZeny() {
        $modelZeny = LogZenyModel::find()->where(['id_user' => Yii::$app->user->id])->all();
        $modelLoan = null;

        return $this->render('zeny', [
            'modelZeny' => $modelZeny,
            'modelLoan' => $modelLoan,
        ]);

    }
    public function actionLoan() {

        return $this->render('loan', [
        ]);

    }
    public function actionTransfer() {

        return $this->render('transfer', [
        ]);

    }
    public function actionPassword() {
        $model = new RePasswordPersonal();
        $model->id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->checkOld()) {
                return $this->redirect(Yii::$app->seo->getUrl('personal'));
            }
        }
        return $this->render('password', [
            'model' => $model,
        ]);

    }
    
    public function actionRank() {
        $position = Yii::$app->request->get('pos');
        $log = \app\models\LogRankModel::find()->where(['id_user' =>Yii::$app->user->id])->all();
        $model = \app\models\RulesModel::find()->where(['type' => 'rank'])->one();
        return $this->render('rank', [
            'position' => $position,
            'log' => $log,
            'model' => $model,
        ]);
    }
    
    public function actionInbox() {
        $searchModel = new PersonalMessagesSearchModel();
        $dataProvider = $searchModel->searchInBox(Yii::$app->request->queryParams);
        return $this->render('inbox', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSentbox() {
        $searchModel = new PersonalMessagesSearchModel();
        $dataProvider = $searchModel->searchSentBox(Yii::$app->request->queryParams);
        return $this->render('sentbox', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionSent() {
        $model = new PersonalMessagesModel();
        //$model->scenario = 'sent';
        $user = Yii::$app->request->get('to');
        $username = '';
        if($user){
            $username = UserModel::getName($user);
            $model->id_user_to = $user;
        }
        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model);exit();
            //$model->id_user_to = UserModel::getUserByName($model->username)->id;
            $model->id_user_from = Yii::$app->user->id;
            $model->create_time = date('Y-m-d H:i:s');
            $model->read = 0;
            $model->show_sent = 1;
            $model->delete = 0;
            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('personal/sentbox')]);
            }
        }
        return $this->render('_sent', [
            'model' => $model,
            'username' => $username
        ]);
    }
    
    public function actionView_pm($id)
    {
        $model = $this->findModelPM($id);
        if($this->checkDelPM($model->id_user_to) && $model->delete != 1){
            $user = UserModel::findOne($model->id_user_from);
            $model->read = 1;
            $model->save();
            return $this->render('view_pm', [
                'model' => $model,
                'user' => $user,
            ]);
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /*public function actionEdit_pm($id)
    {
        $model = $this->findModelPM($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/
    
    public function actionDel_pm_inbox()
    {
        $id = Yii::$app->request->get('id');
        $model = $this->findModelPM($id);
        if($this->checkDelPM($model->id_user_to)){
            $model->delete = 1;
            if($model->save()){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function actionDel_pm_sentbox()
    {
        $id = Yii::$app->request->get('id');
        $model = $this->findModelPM($id);
        if($this->checkDelPM($model->id_user_from)){
            $model->show_sent = 0;
            if($model->save()){
                return TRUE;
            }
        }
        return FALSE;
    }
    
    public function actionChangeread() {
        if(Yii::$app->request->post() && isset(Yii::$app->request->post()['selected'])){
            $id = Yii::$app->request->post()['selected'];
            $model = $this->findModelPM($id);
            if($this->checkDelPM($model->id_user_to)){
                if($model->read == 1){
                    $model->read = 0;
                }
                else{
                    $model->read = 1;
                }
                if($model->save()){
                    return 1;
                }
            }
        }
        return 0;
        
    }
    
    protected function findModelPM($id)
    {
        if (($model = PersonalMessagesModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function checkDelPM($id){
        if($id == Yii::$app->user->id){
            return true;
        }
        return FALSE;
    }
    
    //find user from ajax
    public function actionFindusername($q = null, $id = null) {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'username' => '']];
        $flag = FALSE;
        if (!is_null($q)) {
            $query = new Query;
            $query->select('id, nickname AS text')
                ->from('db_user')
                //->where(['or',['like', 'username', $q],['like', 'nickname', $q]])
                ->where(['like', 'nickname', $q])
                ->limit(10);
            $command = $query->createCommand();
            $data = $command->queryAll();
            //var_dump($data);
            if(count($data)>0){
                $out['results'] = array_values($data);
            }
            else{
                $flag = true;
                $query = new Query;
                $query->select('id, username AS text')
                    ->from('db_user')
                    //->where(['or',['like', 'username', $q],['like', 'nickname', $q]])
                    ->where(['like', 'username', $q])
                    ->limit(10);
                $command = $query->createCommand();
                $data = $command->queryAll();
                $out['results'] = array_values($data);
            }
            
        }
        elseif ($id > 0) {
            $model = UserModel::find($id);
            //$name = $model->username;
            $name = $flag ? $model->username:$model->nickname;
            $out['results'] = ['id' => $id, 'username' => $name];
        }
        return $out;
    }
    

}
