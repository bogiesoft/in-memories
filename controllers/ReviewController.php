<?php

namespace app\controllers;

use app\components\MyController;
use yii\filters\VerbFilter;
use app\models\TravelModel;
//use app\models\RestaurantModel;
use app\models\MainMenuModel;
use yii\web\NotFoundHttpException;

class ReviewController extends MyController
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }
    
    public function beforeAction($action)
    {
        if (\Yii::$app->user->isGuest){
            return $this->redirect(Yii::$app->seo->getUrl('site/login'));
        }
        $this->enableCsrfValidation = false;
        $check = MainMenuModel::findOne(['url'=>'review']);
        if(!$check || !$check->active){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return parent::beforeAction($action);
    }
    
    public function actionTravel(){
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('travel');
    }
    public function actionRestaurant(){
        if (\Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        return $this->render('restaurant');
    }
    public function actionView($model,$id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id,$model),
            'type' => $model,
        ]);
    }
    
    protected function findModel($id,$modelSelected)
    {   if($modelSelected == 'travel'){
            $model = TravelModel::findOne($id);
        }
        else if($modelSelected == 'travel'){
            //$model = RestaurantModel::findOne($id);
        }
        else{
            $model = null;
        }
        if ($model !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
}