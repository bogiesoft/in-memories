<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LogExpModel;
use app\models\LogExpSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserModel;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\UserAuth;

/**
 * ExpController implements the CRUD actions for LogExpModel model.
 */
class LogexpController extends AdminController
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
            'access' => [
                   'class' => AccessControl::className(),
                   // We will override the default rule config with the new AccessRule class
                   'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   'only' => ['create', 'update', 'delete'],
                   'rules' => [
                       [
                           //'actions' => ['update','create','delete'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               //UserAuth::STATUS_ACTIVE,
                               UserAuth::PERMISSION_DEVIL,
                               //UserAuth::PERMISSION_HERO,
                               //UserAuth::PERMISSION_CREEP,
                           ],
                       ],
                       
                   ],
               ],
        ];
    }

    /**
     * Lists all LogExpModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogExpSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LogExpModel model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LogExpModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LogExpModel();

        if ($model->load(Yii::$app->request->post())) {
            $model->create_time = date('Y-m-d');
            $model->id_admin = Yii::$app->user->id;
            if($model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
                'model' => $model,
            ]);
        
    }

    /**
     * Updates an existing LogExpModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LogExpModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the LogExpModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogExpModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogExpModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionCheck() {
        $date_from = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-1 month" ) );
        $date_to = date('Y-m-d');
        $user = null;
        
        $category_all = ['gallery','memory','like','feel','comment','report'];
        $category = $category_all;
        
        if(Yii::$app->request->post()){
            
            if(isset(Yii::$app->request->post()['category'])){
                $category = Yii::$app->request->post()['category'];
            }
            else{
                $category = [];
            }
            if(isset(Yii::$app->request->post()['date_range_from']) && isset(Yii::$app->request->post()['date_range_to'])){
                $date_from = Yii::$app->request->post()['date_range_from'];
                $date_to = Yii::$app->request->post()['date_range_to'];
            }
            if(isset(Yii::$app->request->post()['user'])){
                $user = Yii::$app->request->post()['user'];
            }
        }
        $searchModel = new LogExpSearchModel();
        $dataProvider = $searchModel->searchByFilter(Yii::$app->request->queryParams, $date_from,$date_to,$user,$category);
        
        return $this->render('check', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'date_from' => $date_from,
            'date_to' => $date_to,
            'user' => $user,
            'category' => $category,
            'category_all' => $category_all,
        ]);
    }
    
    public function actionUpexp($id) {
        $log = LogExpModel::findOne($id);
        if($log){
            $user = UserModel::findOne($log->id_user);
        }
        
        if(isset($user)){
            $user->exp += $log->exp;
            $log->active = 1;
            if($user->save() && $log->save()){
                return $this->redirect(['check']);
            }
            
        }
    }
    public function actionNonexp($id) {
        $log = LogExpModel::findOne($id);
        $log->active = -1;
        if($log->save()){
            return $this->redirect(['check']);
        }
    }
    
    public function actionActive() {
        $date_from = Yii::$app->request->get('from');
        $date_to = Yii::$app->request->get('to');
        $category = Yii::$app->request->get('category');
        $user = Yii::$app->request->get('user');
        if($category){
            $category = explode(':', $category);
        }
        
        $searchModel = new LogExpSearchModel();
        $dataProvider = $searchModel->searchByFilter(Yii::$app->request->queryParams, $date_from,$date_to,$user,$category);
        if($dataProvider->models){
            foreach ($dataProvider->models as $row) {
                $this->updateExp($row);
            }
        }
        Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was successful.',
                        'title' => 'Success!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
        ]);
        return $this->redirect(['check']);
        
    }
    
    public function updateExp($model) {

        $user = UserModel::findOne($model->id_user);
        
        if($user){
            $user->exp += $model->exp;
            $model->active = 1;
            if($user->save() && $model->save()){
                return $this->redirect(['check']);
            }
            
        }
    }
    
    public function createLog($id_user, $id_admin, $id_cat, $category, $detail=null, $exp) {
        $model = new LogExpModel();
        $model->id_user = $id_user;
        $model->id_admin = $id_admin;
        $model->id_cat = $id_cat;
        $model->category = $category;
        $model->detail = $detail;
        $model->exp = $exp;
        $model->create_time = date('Y-m-d');
        $model->active = 0;
        if($model->save()){
            return true;
        }
        else{
            return FALSE;
        }
        
    }
}