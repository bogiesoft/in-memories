<?php

namespace app\controllers;

use Yii;
use app\components\MyController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\BoardTopicModel;
use app\models\BoardCommentModel;
use app\models\LikeDataModel;
use app\models\BoardNotiCommentModel;
use yii\data\Pagination;
use app\models\MainMenuModel;

/**
 * BoardController implements the CRUD actions for BoardModel model.
 */
class BoardController extends MyController
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
        $check = MainMenuModel::findOne(['url'=>'board']);
        if(!$check || !$check->active){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        return parent::beforeAction($action);
    }

    /**
     * Lists all BoardModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        /*$searchModel = new BoardSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
        return $this->redirect(Yii::$app->seo->getUrl('board/forum'));
    }
    
    public function actionForum() {
        $id = 0;
        $model = BoardTopicModel::findAll(['id_forum' => $id]);
        return $this->render('forum', [
            'model' => $model,
        ]);
    }

    public function actionTopic($id)
    {
        $comment = BoardCommentModel::find()->where(['id_topic'=>$id,'id_parent'=>0])->orderBy(['post_time'=>SORT_ASC]);
        $count = $comment->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 10]);

        // limit the query using the pagination and retrieve the articles
        $comments = $comment->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        $model = BoardTopicModel::findOne($id);
        $this->updateRead($model);
        return $this->render('topic', [
            'model' => $model,
            'comments' => $comments,
            'pages' => $pagination,
        ]);
    }
    
    public function actionNewtopic() {
        $model = new BoardTopicModel();

        if ($model->load(Yii::$app->request->post())) {
            $model->id_forum = 0;
            $model->id_user = Yii::$app->user->id;
            $model->tag = 'none';
            $model->post_time = date('Y-m-d H:i:s');
            $model->edit_time = null;
            $model->post_ip = Yii::$app->request->getUserIP();
            $model->read = 0;
            $model->reply = 0;
            if($model->save()){
                return $this->redirect(Yii::$app->seo->getUrl('board/forum'));
            }
        } else {
            return $this->render('new_topic', [
                'model' => $model,
            ]);
        }
    }
    
    public function actionEdittopic($id) {
        $model = BoardTopicModel::findOne($id);
        
        /********** check permission edit **********/
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->edit_time = date('Y-m-d H:i:s');
            if($model->save()){
                return $this->redirect(Yii::$app->seo->getUrl('board/topic').'/'.$id);
            }
        } else {
            return $this->render('edit_topic', [
                'model' => $model,
            ]);
        }
    }
    public function actionComment($id) {
        $topic = BoardTopicModel::findOne($id);
        $model = new BoardCommentModel();
        $reply = Yii::$app->request->get('reply');
        $user = Yii::$app->request->get('to');
        if ($model->load(Yii::$app->request->post())) {
            $model->id_topic = $id;
            $model->id_user = Yii::$app->user->id;
            $model->id_parent = $reply ? $reply : 0;
            $model->post_time = date('Y-m-d H:i:s');
            $model->edit_time = null;
            $model->post_ip = Yii::$app->request->getUserIP();
            if($model->save()){
                $this->updateReply($topic);
                $this->updateNotiComment($model, $topic, $reply, $user);
                return $this->redirect(Yii::$app->seo->getUrl('board/topic').'/'.$id);
            }
        } else {
            return $this->render('comment', [
                'model' => $model,
                'topic' => $topic,
            ]);
        }
    }
    
    public function actionEditcomment($id) {
        $model = BoardCommentModel::findOne($id);
        $topic = BoardTopicModel::findOne($model->id_topic);
        
        /********** check permission edit **********/
        if(!$this->checkPermission($model->id_user)){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $model->edit_time = date('Y-m-d H:i:s');
            if($model->save()){
                return $this->redirect(Yii::$app->seo->getUrl('board/topic').'/'.$model->id_topic);
            }
        } else {
            return $this->render('edit_comment', [
                'model' => $model,
                'topic' => $topic,
            ]);
        }
    }
    
    public function actionSearch() {
        $search = null;
        if (Yii::$app->request->get('search')) {
            $data = Yii::$app->request->get('search');
            $search = BoardTopicModel::find()->andWhere(['like', 'title', '%'.$data.'%', false])->all();
            $this->view->params['search-data'] = $data;
        }
        return $this->render('search', [
            'data' => $search,
        ]);
    }
    
    public function actionCommentHistory() {
        $model = BoardNotiCommentModel::find()->where(['id_user_post' => Yii::$app->user->id])->orderBy(['post_time'=>SORT_DESC])->all();
        return $this->render('comment_history', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdatelike() {
        if(Yii::$app->request->post()){
            $id = Yii::$app->request->post()['id'];
            $category = Yii::$app->request->post()['cat'];
            $value = Yii::$app->request->post()['val'];
            
            $model = LikeDataModel::find()->where(['id_user' => Yii::$app->user->id, 'id_like_cat' => $id, 'category' => $category])->one();
            if($model){
                if($model->like_value == $value){
                    $model->like_value = 0;
                }
                else{
                    $model->like_value = $value;
                }
                if($model->save()){
                    $like = LikeDataModel::countAllLike($id, $category);
                    $unlike = LikeDataModel::countAllUnlike($id, $category);
                    return $like.','.$unlike;
                }
            }
            else{
                $new = new LikeDataModel();
                $new->id_user = Yii::$app->user->id;
                $new->id_like_cat = $id;
                $new->like_value = $value;
                $new->category = $category;
                if($new->save()){
                    $like = LikeDataModel::countAllLike($id, $category);
                    $unlike = LikeDataModel::countAllUnlike($id, $category);
                    return $like.','.$unlike;
                }
            }
        }
        return 0;
    }
    
    //create cookie after see topic
    public function updateRead($model) {
        $cookies = Yii::$app->request->cookies;
        $value = substr(Yii::$app->getSecurity()->generateRandomString(),10);
        //var_dump($cookies['data-reading-v' . $model->id]);exit();
        if (!isset($cookies['data-reading-v' . $model->id])) {
            
            $model->read += 1;
            if($model->save()){
                $cookies = Yii::$app->response->cookies;
                $cookies->add(new \yii\web\Cookie([
                    'name' => 'data-reading-v' . $model->id,
                    'value' => $value,
                    //'expire' => 60*60,
                ]));
            }
        }
        
    }
    
    //update reply after see topic
    public function updateReply($model) {
        $model->reply += 1;
        $model->save();
    }
    
    //update noti after post
    public function updateNotiComment($comment, $topic, $reply=null, $user=null) {
        $noti = new BoardNotiCommentModel();
        if($reply){
            //$model_reply = BoardCommentModel::findOne($reply);
            $noti->id_user_post = $user;
            $noti->id_comment = $comment->id;
            $noti->category ='comment';
            
        }else{
            $noti->id_user_post = $topic->id_user;
            $noti->id_comment = $comment->id;
            $noti->category ='topic';
        }
        $noti->id_user = Yii::$app->user->id;
        $noti->id_topic = $topic->id;
        $noti->title = null;
        $noti->post_time = date('Y-m-d H:i:s');
        $noti->active = 0;
        
        //dont create noti if you comment to your post
        if($noti->id_user != $noti->id_user_post){
            if($noti->save()){

            }
        }
        
    }
    
    //AJAX update active to reading
    public function actionUpdateCommentReading() {
        if(Yii::$app->request->post() && isset(Yii::$app->request->post()['selected'])){
            $id = Yii::$app->request->post()['selected'];
            $model = BoardNotiCommentModel::findOne($id);
            $model->active = 1;
            if($model->save()){
                return 1;
            }
        }
        return 0;
    }
    
}