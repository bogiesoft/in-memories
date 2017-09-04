<?php

namespace app\controllers;

use Yii;
use app\models\AlertModel;
use app\models\AlertSearchModel;
use app\components\MyController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * ALertController implements the CRUD actions for AlertModel model.
 */
class AlertController extends MyController
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
    
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest){
            return $this->redirect(Yii::$app->seo->getUrl('site/login'));
        }
        if(!$this->checkPermissionRank('alert')){
            throw new ForbiddenHttpException("Forbidden access is denied");
        }
        $this->enableCsrfValidation = false;
        
        return parent::beforeAction($action);
    }

    /**
     * Lists all AlertModel models.
     * @return mixed
     */
    public function actionIndex()
    {   
        //redirect for sort alert time
        if (!Yii::$app->request->get('sort')) {
            return $this->redirect([Yii::$app->seo->getUrl('alert').'?sort=-show_date']);
        }
        $searchModel = new AlertSearchModel();
        
        $dataProvider = $searchModel->searchByUser(Yii::$app->request->queryParams, Yii::$app->user->id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AlertModel model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new AlertModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        //$this->isLogin();
        $model = new AlertModel();
        
        if ($model->load(Yii::$app->request->post())) {
            //var_dump($model->theme);exit();
            $model->id_user = Yii::$app->user->id;
            $model->create_time = date('Y-m-d H:i:s');
            $model->read = 0;
            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('alert')]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AlertModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->update_time = date('Y-m-d H:i:s');
            if($model->save()){
                return $this->redirect([Yii::$app->seo->getUrl('alert')]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AlertModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AlertModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AlertModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AlertModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionChangeread() {
        if(Yii::$app->request->post() && isset(Yii::$app->request->post()['selected'])){
            $id = Yii::$app->request->post()['selected'];
            $model = AlertModel::findOne($id);
            if($this->checkPermission($model->id_user)){
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
    
}