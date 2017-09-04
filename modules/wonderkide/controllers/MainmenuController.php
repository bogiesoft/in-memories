<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\MainMenuModel;
use app\models\MainMenuSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MainMenuController implements the CRUD actions for MainMenuModel model.
 */
class MainmenuController extends AdminController
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
     * Lists all MainMenuModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MainMenuSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MainMenuModel model.
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
     * Creates a new MainMenuModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MainMenuModel();
        $model->onMobile = 1;
        $model->active = 1;

        if ($model->load(Yii::$app->request->post())) {
            $model->sort = $this->getSorting();
            if($model->save()){
                return $this->redirect(['index']);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MainMenuModel model.
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
     * Deletes an existing MainMenuModel model.
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
     * Finds the MainMenuModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MainMenuModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MainMenuModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionSorting($id) {
        $model = MainMenuModel::findOne($id);
        $sort = $model->sort;

        $condition = ['>', 'sort', $sort];
        $orderBy = ['sort' => SORT_ASC];


        if (isset($_GET['action']) && $_GET['action'] == 'up') {
            $condition = ['<', 'sort', $sort];
            $orderBy = ['sort' => SORT_DESC];
        }


        $nextModel = MainMenuModel::find()->where($condition)/*->andWhere(['id_language'=>$lang])*/->orderBy($orderBy)->one();

        if (!empty($model) && !empty($nextModel)) {
            $model->sort = $nextModel->sort;
            $nextModel->sort = $sort;
            $nextModel->update();
            $model->update();
        }

        return $this->redirect(['/wonderkide/mainmenu']);
    }

    private function getSorting() {
        $sort = 1;
        $model = MainMenuModel::find()->orderBy(['sort' => SORT_DESC])->one();
        if (!empty($model)) {
            $sort +=$model->sort;
        }
        return $sort;
    }
}