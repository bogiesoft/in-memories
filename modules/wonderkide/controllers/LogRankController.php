<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LogRankModel;
use app\models\LogRankSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LogRankController implements the CRUD actions for LogRankModel model.
 */
class LogRankController extends AdminController
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
     * Lists all LogRankModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LogRankSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model = new LogRankModel();

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
        if (($model = LogRankModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }*/
    
    public function createLog($user_id, $rank, $rank_up) {
        $model = new LogRankModel();
        $model->id_user = $user_id;
        $model->id_admin = Yii::$app->user->id;
        $model->rank = $rank;
        $model->rank_up = $rank_up;
        $model->create_date = date('Y-m-d');
        if($model->save()){
            return $model->id;
        }
        return FALSE;
    }
}