<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LogGameModel;
use app\models\LogGameSearchModel;
use app\components\api\calculateTicket;

class GamesController extends AdminController
{   
    
    public function actionIndex(){

        $searchModel = new LogGameSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCalculateticket(){
        $searchModel = new LogGameSearchModel();
        $dataProvider = $searchModel->noneActive(Yii::$app->request->queryParams);
        //$this->view->params['league_selected'] = 1; //default dropdown
        
        if(Yii::$app->request->post()){
            //var_dump(Yii::$app->request->post()['date']);exit();
            //$date = '2016-03-05';
            $date = Yii::$app->request->post()['date'];
            /*if(empty($date)){
                $date = '';
            }*/
            //$id_league = Yii::$app->request->post()['league'];
            //$this->view->params['league_selected'] = $id_league;
            //Yii::$app->getSession()->set
            $check = calculateTicket::calculateTicket();
            if($check==0){
                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'WTF.',
                    'title' => 'Can not update log !!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
            if($check==1){
                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'User not play.',
                    'title' => 'No log game update!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
            if($check==2){
                Yii::$app->getSession()->setFlash('error', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Some match are not updated.',
                    'title' => 'Calculate error!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
            if($check==111){
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
            
        }

        return $this->render('calculateTicket', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    
    /**
     * Displays a single LogGameModel model.
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
     * Creates a new LogGameModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LogGameModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_game_log]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LogGameModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_game_log]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LogGameModel model.
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
     * Finds the LogGameModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LogGameModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LogGameModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}