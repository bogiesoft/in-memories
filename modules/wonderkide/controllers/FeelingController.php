<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\FeelingCommentModel;
use app\models\FeelingCommentSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MainDataModel;
use yii\web\UploadedFile;
use app\models\ExpModel;

/**
 * FeelingController implements the CRUD actions for FeelingCommentModel model.
 */
class FeelingController extends AdminController
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
     * Lists all FeelingCommentModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FeelingCommentSearchModel();
        $dataProvider = $searchModel->searchNonActive(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCreatelog($id) {
        $model = $this->findModel($id);
        if($model->active ==0){
            $exp = ExpModel::findOne(['category'=>'feeling']);

            $log = LogexpController::createLog($model->id_user_owner, Yii::$app->user->id, $model->id, 'feeling', 'feelling to user', $exp->exp);
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
        return $this->redirect(['/wonderkide/feeling']);
    }
    
    public function actionPunishlog($id) {
        $model = $this->findModel($id);
        if($model->active ==0){
            $exp = ExpModel::findOne(['category'=>'feeling']);

            $log = LogexpController::createLog($model->id_user, Yii::$app->user->id, $model->id, 'feeling', 'feelling to user', $exp->exp*-1);
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
        return $this->redirect(['/wonderkide/feeling']);
    }
    
    public function actionActive() {
        $model = FeelingCommentModel::find()->where(['active'=>0,'value'=>1])->all();
        if($model){
            $exp = ExpModel::findOne(['category'=>'feeling']);
            foreach ($model as $row) {
                $log = LogexpController::createLog($row->id_user_owner, Yii::$app->user->id, $row->id, 'feeling', 'feelling to user', $exp->exp);
                if($log){
                    $row->active = 1;
                    $row->save();
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
        return $this->redirect(['/wonderkide/feeling']);
    }

    /**
     * Displays a single FeelingCommentModel model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new FeelingCommentModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new FeelingCommentModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing FeelingCommentModel model.
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
     * Deletes an existing FeelingCommentModel model.
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
     * Finds the FeelingCommentModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FeelingCommentModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FeelingCommentModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionIcon() {
        $model = MainDataModel::find()->where(['type'=>'feeling-icon'])->one();
        if(!$model){
            $model = new MainDataModel();
            $model->type = 'feeling-icon';
            $model->name = 'feeling-icon';
            $model->title = 'in-memo-feeling-icon';
            $model->active = 1;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $old_path = $model->content;
            if (isset($model->imageFile)) {
                $path = '/uploads/img/main/' . date('Ymd-his') . 'feeling-icon-' . $model->imageFile->name;
                $model->content = $path;
            } else {
                $model->content = $model->content;
            }
            if ($model->save()) {
                if (isset($model->imageFile)) {
                    $model->upload($path);
                    if($old_path != ''){
                        $model->delImage($old_path);
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
                return $this->redirect(['/wonderkide/feeling/icon']);
            }
        }
        $model->scenario = 'upload';
        return $this->render('icon',[
            'model' => $model
        ]);
    }
    
    public function actionIconActive() {
        $model = MainDataModel::find()->where(['type'=>'feeling-icon-active'])->one();
        if(!$model){
            $model = new MainDataModel();
            $model->type = 'feeling-icon-active';
            $model->name = 'feeling-icon-active';
            $model->title = 'in-memo-feeling-icon-active';
            $model->active = 1;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $old_path = $model->content;
            if (isset($model->imageFile)) {
                $path = '/uploads/img/main/' . date('Ymd-his') . 'feeling-icon-active-' . $model->imageFile->name;
                $model->content = $path;
            } else {
                $model->content = $model->content;
            }
            if ($model->save()) {
                if (isset($model->imageFile)) {
                    $model->upload($path);
                    if($old_path != ''){
                        $model->delImage($old_path);
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
                return $this->redirect(['/wonderkide/feeling/icon-active']);
            }
        }
        $model->scenario = 'upload';
        return $this->render('icon-active',[
            'model' => $model
        ]);
    }
    
    public function actionPoint() {
        if(Yii::$app->request->post()){
            $date_from = date("Y-n-j", strtotime("first day of this month"));
            $date_to = date("Y-n-j", strtotime("last day of this month"));
            $check = \app\models\LogDataModel::find()->where(['type'=>'update-point'])->andWhere(['between', 'create_date', $date_from, $date_to])->one();
            if(!$check){
                $user = \app\models\UserModel::find()->all();
                $point = \app\models\SettingModel::getPoint();
                foreach ($user as $row) {
                    $check_rank = \app\models\RankModel::findOne(['detail'=>'update-credit']);
                    if($check_rank && $check_rank->exp <= $row->exp){
                        $row->post_point += $point+floor(($point*0.5));
                    }
                    else{
                        $row->post_point += $point;
                    }
                    $row->save();
                }
                LogdataController::createData(Yii::$app->user->id, 'update-point', 'update-point', 'update-point-'.date("Y-m-d"), 1);
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
                Yii::$app->getSession()->setFlash('danger', [
                    'type' => 'danger',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'ข้อมูลนี้ได้ทำการอัพเดทประจำเดือนไปแล้ว.',
                    'title' => 'ไม่สามารถดำเนินการได้!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
            }
        }
        return $this->render('point',[
        ]);
    }
}