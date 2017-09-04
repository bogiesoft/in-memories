<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\TravelModel;
use app\models\TravelSearchModel;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * TravelController implements the CRUD actions for TravelModel model.
 */
class TravelController extends AdminController
{

    /**
     * Lists all TravelModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TravelSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TravelModel model.
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
     * Creates a new TravelModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TravelModel();
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            
            $model->id_user_create = Yii::$app->user->getId();
            $model->id_user_update = Yii::$app->user->getId();
            $model->create_post = date('Y-m-d h:i:s');
            $model->update_post = date('Y-m-d h:i:s');
            
            if (isset($model->imageFile)) {
                $filename = date('Ymd-his') . '-' . $model->imageFile->name;
                //$upTime = date('Ymd-his');
                $model->image = $filename;
            } else {
                $model->image = $model->image;
            }
            if ($model->save()) {
                if (isset($model->imageFile)) {
                    $model->upload($filename);
                }
                return $this->redirect(['/wonderkide/travel']);
            }
        }
        /*if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_travel]);
        }*/ else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TravelModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = TravelModel::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            //$model->id_user_create = Yii::$app->user->getId();
            $model->id_user_update = Yii::$app->user->getId();
            //$model->create_post = date('Ymd-his');
            $model->update_post = date('Y-m-d h:i:s');
            if (isset($model->imageFile)) {
                $filename = date('Ymd-his') . '-' . $model->imageFile->name;
                //$upTime = date('Ymd-his');
                TravelModel::delImage($model);
                $model->image = $filename;
            } else {
                $model->image = $model->image;
            }
            if ($model->save()) {
                if (isset($model->imageFile)) {
                    $model->upload($filename);
                }
                return $this->redirect(['/wonderkide/travel']);
            }
        }
        /*$model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_travel]);
        }*/ else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TravelModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if($model){
            if($model->image){
                TravelModel::delImage($model);
            }
            $model->delete();
        }
        //TravelModel::delImage($this->findModel($id));
        return $this->redirect(['index']);
    }

    /**
     * Finds the TravelModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TravelModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TravelModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}