<?php

namespace app\controllers;

use Yii;
use app\components\MyController;
use yii\filters\VerbFilter;
use app\models\LikeDataModel;

/**
 * BoardController implements the CRUD actions for BoardModel model.
 */
class LikeboxController extends MyController
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
        
        return parent::beforeAction($action);
    }
    
    public function actionUpdatelike() {
        if($this->checkBanned()){
            return $this->redirect(Yii::$app->seo->getUrl('wonder/banned'));
        }
        if(Yii::$app->request->post()){
            $id = Yii::$app->request->post()['id'];
            $main_category = Yii::$app->request->post()['cat'];
            $value = Yii::$app->request->post()['val'];
            $owner = Yii::$app->request->post()['owner'];
            $sub_category = null;
            if(isset(Yii::$app->request->post()['sub_cat']) && Yii::$app->request->post()['sub_cat'] != ''){
                $sub_category = Yii::$app->request->post()['sub_cat'];
            }
            
            $model = LikeDataModel::find()->where(['id_user' => Yii::$app->user->id, 'id_like_cat' => $id, 'main_category' => $main_category])->one();
            if($model){
                if($model->like_value == $value){
                    $model->like_value = 0;
                }
                else{
                    $model->like_value = $value;
                }
                if($model->save()){
                    $like = LikeDataModel::countAllLike($id, $main_category, $sub_category);
                    $unlike = LikeDataModel::countAllUnlike($id, $main_category, $sub_category);
                    return $like.','.$unlike;
                }
            }
            else{
                $new = new LikeDataModel();
                $new->id_user = Yii::$app->user->id;
                $new->id_like_cat = $id;
                $new->like_value = $value;
                $new->main_category = $main_category;
                $new->sub_category = $sub_category;
                $new->create_date = date('Y-m-d');
                $new->active = 0;
                if($new->save()){
                    $like = LikeDataModel::countAllLike($id, $main_category, $sub_category);
                    $unlike = LikeDataModel::countAllUnlike($id, $main_category, $sub_category);
                    
                    if($owner != Yii::$app->user->id){
                        $url = $this->generateUrlNotifyLike($main_category, $id);
                        NotifyController::creatNotify($owner, $id, $main_category, 'like', $value, $url);
                    }
                    
                    return $like.','.$unlike;
                }
            }
        }
        return 0;
    }
    
    public function generateUrlNotifyLike($cat, $id) {
        if($cat == 'gallery'){
            $link = \app\models\GalleryModel::findOne($id);
            $url = '/gallery/view/' . $link->ref;
        }
        else{
            $url = '/' . $cat . '/view/' . $id;
        }
        return $url;
    }
    
    
}