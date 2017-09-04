<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\RankModel;
use app\models\RankSearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserModel;
use yii\filters\AccessControl;
use app\components\AccessRule;
use app\models\UserAuth;

/**
 * RankController implements the CRUD actions for RankModel model.
 */
class RankController extends AdminController
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
            'access' => [
                   'class' => AccessControl::className(),
                   // We will override the default rule config with the new AccessRule class
                   'ruleConfig' => [
                       'class' => AccessRule::className(),
                   ],
                   'only' => ['create', 'delete'],
                   'rules' => [
                       [
                           //'actions' => ['update','create','delete'],
                           'allow' => true,
                           // Allow users, moderators and admins to create
                           'roles' => [
                               //UserAuth::STATUS_ACTIVE,
                               UserAuth::PERMISSION_DEVIL,
                               //UserAuth::PERMISSION_HERO,
                               //UserAuth::PERMISSION_CREEP,
                           ],
                       ],
                       
                   ],
               ],
        ];
    }

    /**
     * Lists all RankModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RankSearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RankModel model.
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
     * Creates a new RankModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RankModel();
        //$model->

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RankModel model.
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
     * Deletes an existing RankModel model.
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
     * Finds the RankModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RankModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RankModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionLevelup() {
        $model = UserModel::find()->all();
        return $this->render('levelup', [
                'model' => $model,
        ]);
    }
    
    public function actionUpgrade() {
        if (Yii::$app->request->get('u') && Yii::$app->request->get('r')) {
            $user = UserModel::findOne(Yii::$app->request->get('u'));
            $rank = RankModel::findOne(Yii::$app->request->get('r'));
            if($user && $rank && $user->exp >= $rank->exp){
                
                $log_id = LogRankController::createLog($user->id, $user->id_rank, $rank->id);
                \app\controllers\NotifyController::creatNotify($user->id, $rank->id, 'rank', 'up', $rank->name, Yii::$app->seo->getUrl('personal/rank?pos='.$log_id));
                $user->id_rank = $rank->id;
                
                if($user->save()){
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
                        'type' => 'success',
                        'duration' => 5000,
                        'icon' => 'fa fa-users',
                        'message' => 'Update error.',
                        'title' => 'Error!!',
                        'positonY' => 'top',
                        'positonX' => 'right'
                    ]);
                }
                return $this->redirect(['levelup']);
            }
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}