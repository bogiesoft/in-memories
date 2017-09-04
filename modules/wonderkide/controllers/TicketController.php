<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\components\api\getOdds;

class TicketController extends AdminController
{
    
    public function actionIndex(){

        /*$searchModel = new MatchSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        */
        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionPull(){
        
        $this->view->params['league_selected'] = 1; //default dropdown
        
        if(Yii::$app->request->post()||!empty(Yii::$app->request->post()['league'])){
            //var_dump(Yii::$app->request->post()['league']);exit();
            //$date = '2016-03-05';
            //$date = null;
            if(empty($date)){
                $date = '';
            }
            $id_league = Yii::$app->request->post()['league'];
            $this->view->params['league_selected'] = $id_league;
            //Yii::$app->getSession()->set
            if(getOdds::addOdds($id_league, $date)){
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
                    'message' => 'Please check fixture and try again.',
                    'title' => 'Update error!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
        }

        return $this->render('pull', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }
    
}