<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LogDataModel;
use app\models\LogDataSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\UserAuth;

/**
 * LogdataController implements the CRUD actions for LogDataModel model.
 */
class LogdataController extends AdminController
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
                   'only' => ['index','create', 'update', 'delete'],
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
     * Lists all LogDataModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogDataSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LogDataModel model.
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
     * Creates a new LogDataModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LogDataModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LogDataModel model.
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
     * Deletes an existing LogDataModel model.
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
     * Finds the LogDataModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogDataModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogDataModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function createData($id, $type, $name, $detail, $active) {
        $model = new LogDataModel();
        $model->id_admin = $id;
        $model->type = $type;
        $model->name = $name;
        $model->detail = $detail;
        $model->create_date = date('Y-m-d');
        $model->active = $active;
        if($model->save()){
            return true;
        }
        else{
            return FALSE;
        }
    }
}