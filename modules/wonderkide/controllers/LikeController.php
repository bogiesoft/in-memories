<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\LikeDataModel;
use app\models\LikeDataSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\ExpModel;

/**
 * LikeController implements the CRUD actions for LikeDataModel model.
 */
class LikeController extends AdminController
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
     * Lists all LikeDataModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LikeDataSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LikeDataModel model.
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
     * Creates a new LikeDataModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new LikeDataModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing LikeDataModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Deletes an existing LikeDataModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the LikeDataModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LikeDataModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LikeDataModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionCheck() {
        $searchModel = new LikeDataSearchModel();
        $dataProvider = $searchModel->searchNonActive(Yii::$app->request->queryParams);

        return $this->render('check', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreatelog($id) {
        $model = $this->findModel($id);
        if($model->active ==0){
            $exp = ExpModel::findOne(['category'=>'like']);
            $user = $this->findUserByCategory($model->id_like_cat, $model->main_category);
            $log = LogexpController::createLog($user, Yii::$app->user->id, $model->id, 'like', 'like to user', $exp->exp);
            if($log){
                $model->active = 1;
                $model->save();
                Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was successful.',
                        'title' => 'Success!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);

            }else{
                Yii::$app->getSession()->setFlash('danger', [
                        'type' => 'danger',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was error.',
                        'title' => 'Error!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);
            }

        }
        return $this->redirect(['/wonderkide/like/check']);
    }
    
    public function actionPunishlog($id) {
        $model = $this->findModel($id);
        if($model->active ==0){
            $exp = ExpModel::findOne(['category'=>'like']);
            
            $log = LogexpController::createLog($model->id_user, Yii::$app->user->id, $model->id, 'like', 'like to user', $exp->exp*-1);
            if($log){
                $model->active = 1;
                $model->save();
                Yii::$app->getSession()->setFlash('success', [
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was successful.',
                        'title' => 'Success!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);

            }else{
                Yii::$app->getSession()->setFlash('danger', [
                        'type' => 'danger',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update was error.',
                        'title' => 'Error!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                ]);
            }
        }
        return $this->redirect(['/wonderkide/like/check']);
    }
    
    public function actionActive() {
        $model = LikeDataModel::find()->where(['active'=>0,'like_value'=>1])->all();
        if($model){
            $exp = ExpModel::findOne(['category'=>'like']);
            foreach ($model as $row) {
                $user = $this->findUserByCategory($row->id_like_cat, $row->main_category);
                if($user){
                    $log = LogexpController::createLog($user, Yii::$app->user->id, $row->id, 'like', 'like to user', $exp->exp);
                    if($log){
                        $row->active = 1;
                        $row->save();
                    }
                }
            }
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
        return $this->redirect(['/wonderkide/like/check']);
    }
    
    public function findUserByCategory($id, $cat) {
        if($cat == 'memory'){
            $model = \app\models\MemoryModel::findOne($id);
            if($model){
                return $model->id_user;
            }
        }
        else if($cat == 'gallery'){
            $model = \app\models\GalleryModel::findOne($id);
            if($model){
                return $model->id_user;
            }
        }
        else{
            return null;
        }
    }
}