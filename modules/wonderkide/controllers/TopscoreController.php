<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LeagueTopScoreModel;
use app\models\LeagueTopScoreSearch;
use yii\web\NotFoundHttpException;
use app\models\LeagueModel;
use app\components\api\updateTopScore;

/**
 * TopscoreController implements the CRUD actions for LeagueTopScoreModel model.
 */
class TopscoreController extends AdminController
{

    /**
     * Lists all LeagueTopScoreModel models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new LeagueTopScoreSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
        $league = LeagueModel::findOne($id);
        
        if(Yii::$app->request->post()||!empty(Yii::$app->request->post()['league'])){
            //var_dump(Yii::$app->request->post());exit();
            $this->upScore(Yii::$app->request->post()['league']);
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'league' => $league,
        ]);
    }

    /**
     * Displays a single LeagueTopScoreModel model.
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
     * Creates a new LeagueTopScoreModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LeagueTopScoreModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_league]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LeagueTopScoreModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id_league]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LeagueTopScoreModel model.
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
     * Finds the LeagueTopScoreModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LeagueTopScoreModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LeagueTopScoreModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    protected function upScore($id){

        //$test = updateLeagueScore::upScore($id);
        if(updateTopScore::upScore($id)){
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
                    'message' => 'Please check link get top score or network and try again.',
                    'title' => 'Update error!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }

    }
}