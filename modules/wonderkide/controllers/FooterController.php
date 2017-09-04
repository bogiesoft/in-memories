<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\FooterModel;
use app\models\FooterSearchModel;
use yii\web\NotFoundHttpException;

/**
 * FooterController implements the CRUD actions for FooterModel model.
 */
class FooterController extends AdminController
{

    /**
     * Lists all FooterModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FooterSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FooterModel model.
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
     * Creates a new FooterModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FooterModel();
        $model->sorting = $this->getSorting();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing FooterModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing FooterModel model.
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
     * Finds the FooterModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FooterModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FooterModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSorting($id) {
        $model = FooterModel::findOne($id);
        $sort = $model->sorting;

        $condition = ['>', 'sorting', $sort];
        $orderBy = ['sorting' => SORT_ASC];
        
        /*$lang =1;
        if(isset($_GET['lang'])){
            $lang = $_GET['lang'];
        }*/

        if (isset($_GET['action']) && $_GET['action'] == 'up') {
            $condition = ['<', 'sorting', $sort];
            $orderBy = ['sorting' => SORT_DESC];
        }


        $nextModel = FooterModel::find()->where($condition)/*->andWhere(['id_language'=>$lang])*/->orderBy($orderBy)->one();

        if (!empty($model) && !empty($nextModel)) {
            $model->sorting = $nextModel->sorting;
            $nextModel->sorting = $sort;
            $nextModel->update();
            $model->update();
        }

        return $this->redirect(['index']);
    }

    private function getSorting() {
        $sort = 1;
        $model = FooterModel::find()->orderBy(['sorting' => SORT_DESC])->one();
        if (!empty($model)) {
            $sort +=$model->sorting;
        }
        return $sort;
    }
}