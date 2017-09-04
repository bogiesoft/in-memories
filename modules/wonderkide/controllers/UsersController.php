<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\UserSearch;
use app\models\UserModel;
use app\models\SignupAdminForm;
use app\models\RePassword;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\UserAuth;
use app\models\RankModel;

class UsersController extends Controller
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
                               //UserAuth::STATUS_DELETED
                               //UserAuth::PERMISSION_NEWBIE,
                           ],
                       ],
                       
                   ],
               ], 
        ];
    }
    
    public function actionIndex(){
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreateusr()
    {   
        $model = new SignupAdminForm();
        $rank = RankModel::genToDropdown();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                return $this->redirect('/wonderkide/users');
            }
        }
        return $this->render('create', [
            'model' => $model,
            'rank' => $rank,
        ]);
    }
    public function actionEditusr($id)
    {
        $model = $this->findModel($id);
        $rank = RankModel::genToDropdown();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/wonderkide/users');
        } else {
            return $this->render('update', [
                'model' => $model,
                'rank' => $rank,
            ]);
        }
    }
    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect('/wonderkide/users');
    }
    
    public function actionResetpassword($id) {
        
        $model = new RePassword();
        $model->id = $id;
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->reset()) {
                return $this->redirect('/wonderkide/users');
            }
        }
        return $this->render('resetpassword', [
                'model' => $model,
            ]);
    }

    /**
     * Finds the UserModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    
}