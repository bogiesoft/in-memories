<?php

namespace app\modules\wonderkide\controllers;

use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\UserAuth;
use yii\web\NotFoundHttpException;

class AdminController extends Controller {
    
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                   'class' => AccessControl::className(),
                   // We will override the default rule config with the new AccessRule class
                   'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   //'only' => ['index','create', 'update', 'delete', 'user','createusr'],
                   'rules' => [
                       [
                           //'actions' => ['index','create','user'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               //UserAuth::STATUS_ACTIVE,
                               UserAuth::PERMISSION_DEVIL,
                               UserAuth::PERMISSION_HERO,
                               UserAuth::PERMISSION_CREEP,
                           ],
                       ],
                       
                   ],
               ], 
        ];
    }
    
    public function beforeAction($action) {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect('/wonderkide/auth/login');
        }
        else{
            if(\Yii::$app->user->getIdentity()->permission < UserAuth::PERMISSION_CREEP){
                throw new NotFoundHttpException('The requested page does not exist.');
            }
        }
        
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
}