<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LeagueScoresModel;
use app\models\LeagueModel;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use app\components\api\updateLeagueScore;

/**
 * LeagueScoresController implements the CRUD actions for LeagueScoresModel model.
 */
class LeaguescoresController extends AdminController
{

    /**
     * Lists all LeagueScoresModel models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => LeagueScoresModel::find()->where(['league_id' => $id,'season' => LeagueModel::season]),
        ]);
        $league = LeagueModel::findOne($id);
        if(Yii::$app->request->post()||!empty(Yii::$app->request->post()['league'])){
            $this->upScore(Yii::$app->request->post()['league']);
        }
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'league' => $league,
        ]);
    }

    /**
     * Displays a single LeagueScoresModel model.
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
     * Creates a new LeagueScoresModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LeagueScoresModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LeagueScoresModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
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

    /**
     * Deletes an existing LeagueScoresModel model.
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
     * Finds the LeagueScoresModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LeagueScoresModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LeagueScoresModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function upScore($id){

        //$test = updateLeagueScore::upScore($id);
        if(updateLeagueScore::upScore($id)){
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Update was successful.',
                    'title' => 'Success!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
            else{
                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Please check link get score or network and try again.',
                    'title' => 'Update error!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }

    }
}