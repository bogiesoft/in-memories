<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\MemoryModel;
use app\models\MemorySearchModel;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserAuth;
use app\models\UserModel;
use yii\imagine\Image;

/**
 * MemoryController implements the CRUD actions for MemoryModel model.
 */
class MemoryController extends AdminController
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
     * Lists all MemoryModel models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MemorySearchModel();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MemoryModel model.
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
     * Creates a new MemoryModel model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    /*public function actionCreate()
    {
        $model = new MemoryModel();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing MemoryModel model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $permission = TRUE;
        $user = UserModel::findOne(Yii::$app->user->id);
        if(UserAuth::PERMISSION_DEVIL == $user->permission){
            $permission = FALSE;
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $img = $this->findImgTags($model->content);
            $model->image_thumb = $img;
            $model->content = $this->textEditorImageResponsive($model->content);
            if($model->save()){
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
                'model' => $model,
                'permission' => $permission,
        ]);
    }

    /**
     * Deletes an existing MemoryModel model.
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
     * Finds the MemoryModel model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MemoryModel the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MemoryModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function findImgTags($html) {
        preg_match('/<img[^>]+>/i',$html, $result);
        if($result && $result[0]){
            preg_match( '@src="([^"]+)"@' , $result[0], $match );
            $src = array_pop($match);
            if($src && $src != ''){
                return $this->createThumbnail($src);
            }
        }
        return null;
    }
    
    private function createThumbnail($src){
      $uploadPath   = '/uploads/img/memory/'.end(explode('/',$src));
      Image::thumbnail(Yii::getAlias('@webroot').'/'.$src, 370, 270)->save(Yii::getAlias('@webroot').$uploadPath, ['quality' => 80]);
      return $uploadPath;
    }
    
    public function textEditorImageResponsive($content) {
        preg_match_all('/<img[^>]+>/i',$content, $result);
        
        if($result[0]){
            $count = count($result[0]);
            for($i=0; $i<$count;$i++){
                preg_match( '@src="([^"]+)"@' , $result[0][$i], $match );
                $src = array_pop($match);
                $content = preg_replace($result[0][$i], 'img src="'.$src.'" class="img-responsive"', $content);
                
            }
        }
        return $content;
        
    }
}