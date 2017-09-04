<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\TagsModel;
use app\models\TagsSearchModel;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagsController implements the CRUD actions for TagsModel model.
 */
class TagsController extends AdminController
{

    /**
     * Lists all TagsModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TagsSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TagsModel model.
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
     * Creates a new TagsModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TagsModel();
        $model->parent_id = 0;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id_tags]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TagsModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
            //return $this->redirect(['view', 'id' => $model->id_tags]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TagsModel model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TagsModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TagsModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TagsModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionChild($id) {
        $searchModel = new TagsSearchModel();
        $dataProvider = $searchModel->searchChild(Yii::$app->request->queryParams, $id);
        $perentModel = $this->findModel($id);

        return $this->render('child', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $perentModel,
        ]);
    }
    
    public function actionCreatechild($id)
    {
        $model = new TagsModel();
        $model->parent_id = $id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/wonderkide/tags/child/'.$id]);
            //return $this->redirect(['view', 'id' => $model->id_tags]);
        } else {
            return $this->render('createchild', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TagsModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdatechild($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/wonderkide/tags/child/'.$model->parent_id]);
            //return $this->redirect(['view', 'id' => $model->id_tags]);
        } else {
            return $this->render('updatechild', [
                'model' => $model,
            ]);
        }
    }
}