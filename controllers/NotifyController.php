<?php

namespace app\controllers;

use Yii;
use app\models\NotifyModel;
use app\models\NotifySearchModel;
use app\components\MyController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * NotifyController implements the CRUD actions for NotifyModel model.
 */
class NotifyController extends MyController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all NotifyModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (\Yii::$app->user->isGuest){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $model = NotifyModel::find()->where(['id_user_owner'=>Yii::$app->user->id])->orderBy(['create_time' => SORT_DESC]);
        $count = $model->count();
        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 10]);
        
        // limit the query using the pagination and retrieve the articles
        $noti = $model->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'model' => $noti,
            'pages' => $pagination,
        ]);
    }


    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new NotifyModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = NotifyModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }*/
    
    public function creatNotify($owner, $id_cat, $cat, $action, $detail, $url) {
        $model = new NotifyModel();
        $model->id_user = Yii::$app->user->id;
        $model->id_user_owner = $owner;
        $model->id_cat = $id_cat;
        $model->category = $cat;
        $model->action = $action;
        $model->detail = $detail;
        $model->url = $url;
        $model->create_time = date('Y-m-d H:i:s');
        $model->active = 0;
        if($model->save()){
            NotifyController::updateUserNotify($owner);
        }
    }
    public function countNotify(){
        
    }
    
    public function actionActive() {
        if(Yii::$app->request->post() && isset(Yii::$app->request->post()['selected'])){
            $id = Yii::$app->request->post()['selected'];
            $model = NotifyModel::findOne($id);
            if($this->checkPermission($model->id_user_owner)){
                if($model->active == 1){
                    $model->active = 0;
                }
                else{
                    $model->active = 1;
                }
                if($model->save()){
                    return 1;
                }
            }
        }
        return 0;
    }
    
    public function updateUserNotify($owner){
        $model = \app\models\UserModel::findOne($owner);
        if($model){
            $model->notify += 1;
            $model->save();
        }
    }
    
    public function actionClearusernotify() {
        if(Yii::$app->request->post() && isset(Yii::$app->request->post()['selected'])){
            $id = Yii::$app->request->post()['selected'];
            $model = \app\models\UserModel::findOne($id);
            if($this->checkPermission($model->id)){
                $model->notify = 0;
                if($model->save()){
                    return 1;
                }
            }
        }
        return 0;
    }
}