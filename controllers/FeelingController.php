<?php

namespace app\controllers;

use Yii;
use app\models\FeelingCommentModel;
use app\models\FeelingCommentSearchModel;
use app\components\MyController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserModel;

/**
 * NotifyController implements the CRUD actions for NotifyModel model.
 */
class FeelingController extends MyController
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
     * Lists all NotifyModel models.
     * @return mixed
     */
    /*public function actionIndex()
    {
        if (\Yii::$app->user->isGuest){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        //$searchModel = new NotifySearchModel();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            //'searchModel' => $searchModel,
            //'dataProvider' => $dataProvider,
        ]);
    }*/


    public function actionUpdateFeeling() {
        if (\Yii::$app->user->isGuest){
            return 8;
        }
        if($this->checkBanned()){
            return $this->redirect(Yii::$app->seo->getUrl('wonder/banned'));
        }
        if(Yii::$app->request->post() && isset(Yii::$app->request->post()['selected']) && isset(Yii::$app->request->post()['owner'])){
            $id = Yii::$app->request->post()['selected'];
            $owner = Yii::$app->request->post()['owner'];
            $model = FeelingCommentModel::find()->where(['id_user'=>Yii::$app->user->id,'id_user_owner'=>$owner,'id_comment'=>$id])->one();
            if($model){
                if($model->value == 1){
                    $model->value = 0;
                    $feel = -1;
                }
                else{
                    $model->value = 1;
                    $feel = 1;
                }
                if($model->save()){
                    $comment = \app\models\CommentModel::findOne($id);
                    $comment->feeling += $feel;
                    $comment->save();
                    return 1;
                }
            }
            else{
                $user = UserModel::findOne(Yii::$app->user->id);
                $user->post_point -= 1;
                if($user->post_point >= 0){
                    $model = new FeelingCommentModel();
                    $model->id_user = Yii::$app->user->id;
                    $model->id_user_owner = $owner;
                    $model->id_comment = $id;
                    $model->value = 1;
                    $model->detail = null;
                    $model->create_time = date('Y-m-d H:i:s');
                    $model->active = 0;

                    if($model->save()){
                        $user->save();
                        $comment = \app\models\CommentModel::findOne($id);
                        $comment->feeling += 1;
                        $comment->save();
                        $url = $this->generateUrlNotifyFeel($comment->category, $comment->id_cat, $id);
                        NotifyController::creatNotify($owner, $model->id, 'feeling', 'feeling', $comment->category, $url);
                        return 1;
                    }
                }
                else{
                    return 2;
                }
            }
        }
        return 0;
    }
    
    public function generateUrlNotifyFeel($cat, $id_cat, $id_comment) {
        if($cat == 'gallery'){
            $link = \app\models\GalleryModel::findOne($id_cat);
            $url = '/gallery/view/' . $link->ref . '#data-comment-' . $id_comment;
        }
        else{
            $url = '/' . $cat . '/view/' . $id_cat . '#data-comment-' . $id_comment;
        }
        return $url;
    }
}