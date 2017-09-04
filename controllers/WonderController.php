<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\components\MyController;
use yii\filters\VerbFilter;
use app\models\GalleryModel;
use yii\web\NotFoundHttpException;
use app\models\ReportModel;
use app\models\UserModel;
use app\models\RankModel;

class WonderController extends MyController
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        //$gallery_all = GalleryModel::find()->where(['show'=>1, 'banned'=>0])->limit(8)->all();

        return $this->render('index', [
            //'gallery' => $gallery_all,
        ]);
    }
    
    public function actionReport() {
        $this->isLogin();
        if($this->checkBanned()){
            return $this->redirect(Yii::$app->seo->getUrl('wonder/banned'));
        }
        $id_cat = Yii::$app->request->get('i');
        $category = Yii::$app->request->get('c');
        $user = Yii::$app->request->get('u');
        
        if(!ReportModel::checkReportPerDay()){
            Yii::$app->getSession()->setFlash('ReportUser',[
                'body'=>'ท่านไม่สามารถรายงานผู้ใช้งานเพิ่มเติมได้แล้วในวันนี้!',
                'options'=>['class'=>'alert-danger']
            ]);
            return $this->render('report', [
            ]);
        }
        
        if($user){
            $username = UserModel::getName($user);
        }
        if($id_cat && $category && isset($username)){
            
            
            $model = new ReportModel();
            $model->username = $username;
            if ($model->load(Yii::$app->request->post())) {
                $model->id_user = Yii::$app->user->id;
                $model->id_user_report = $user;
                $model->id_cat = $id_cat;
                $model->category = $category;
                $model->create_time = date('Y-m-d H:i:s');
                $model->active = 0;
                if($model->save()){
                    Yii::$app->getSession()->setFlash('ReportUser',[
                        'body'=>'ทำการส่งรายงานผู้ใช้งานเรียบร้อย! เราจะตรวจสอบรายงานนี้ให้เร็วที่สุด',
                        'options'=>['class'=>'alert-success']
                    ]);
                    return $this->refresh();
                    //return $this->redirect(['/wonder/report?i='.$id_cat.'&c='.$category.'&u='.$user]);
                }
            }
            return $this->render('report', [
                'model' => $model,
            ]);
        }
        else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
    }
    
    public function actionBanned() {
        $this->isLogin();
        $content = \app\models\ContentModel::findOne(['type'=>'banned-page']);
        return $this->render('banned', [
            'content' => $content,
        ]);
    }
    
    //show user data
    public function actionUser($id) {
        $modelUser = UserModel::findOne($id);
        $rank = RankModel::findOne($modelUser->id_rank);
        return $this->render('user_profile', [
            'modelUser' => $modelUser,
            'rank' => $rank,
        ]);
    }
    

}
