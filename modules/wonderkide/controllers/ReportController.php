<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\ReportModel;
use app\models\ReportSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ExpModel;

/**
 * ReportController implements the CRUD actions for ReportModel model.
 */
class ReportController extends AdminController
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
     * Lists all ReportModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $active = 1;
        if (Yii::$app->request->get('active')) {
            $active = Yii::$app->request->get('active');
        }
        $searchModel = new ReportSearchModel();
        $dataProvider = $searchModel->searchInActive(Yii::$app->request->queryParams, $active);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'active' => $active,
        ]);
    }

    /**
     * Displays a single ReportModel model.
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
     * Creates a new ReportModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ReportModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ReportModel model.
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
     * Deletes an existing ReportModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ReportModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ReportModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ReportModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionCreatelog($id) {
        $model = $this->findModel($id);
        if($model->active ==0){
            $exp = ExpModel::findOne(['category'=>'report']);
            $log = LogexpController::createLog($model->id_user, Yii::$app->user->id, $model->id, 'report', 'report user', $exp->exp);
            if($log){
                $model->active = 1;
                $model->save();
                Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was successful.',
                        'title' => 'Success!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);

            }else{
                Yii::$app->getSession()->setFlash('danger', [
                        'type' => 'danger',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was error.',
                        'title' => 'Error!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);
            }

        }
        return $this->redirect(['/wonderkide/report']);
    }
    
    public function actionPunishlog($id) {
        $model = $this->findModel($id);
        if($model->active ==0){
            $exp = ExpModel::findOne(['category'=>'report']);
            
            $log = LogexpController::createLog($model->id_user, Yii::$app->user->id, $model->id, 'report', 'report user', $exp->exp*-1);
            if($log){
                $model->active = 1;
                $model->save();
                Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was successful.',
                        'title' => 'Success!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);

            }else{
                Yii::$app->getSession()->setFlash('danger', [
                        'type' => 'danger',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was error.',
                        'title' => 'Error!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);
            }
        }
        return $this->redirect(['/wonderkide/report']);
    }
}