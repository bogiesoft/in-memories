<?php

namespace app\modules\wonderkide\controllers;

use Yii;
use app\models\MainDataModel;
use yii\web\UploadedFile;
use app\models\ContactData;

class MainController extends AdminController {

    public function beforeAction($action) {
        /*if(Yii::$app->request->post('language')){
            setcookie("language", Yii::$app->request->post('language'), time() + 60 * 60 * 24 * 30, '/');
            $language = Yii::$app->request->post('language');
        }
        else if(Yii::$app->request->get('lang')){
            $language = Yii::$app->request->get('lang');
        }
        else if(isset($_COOKIE['language'])){
            $language = $_COOKIE['language'];
        }
        else{
            $language = 1; //default TH
        }
        $this->view->params['language'] = $language;*/
        
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionIndex() {
        return $this->render('index');
    }
    public function actionIcon() {
        $model = MainDataModel::find()->where(['type'=>'icon'])->one();
        if(!$model){
            $model = new MainDataModel();
            $model->type = 'icon';
            $model->name = 'icon';
            $model->title = 'in-memo-icon';
            $model->active = 1;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $old_path = $model->content;
            if (isset($model->imageFile)) {
                $path = '/uploads/img/main/' . date('Ymd-his') . '-icon-' . $model->imageFile->name;
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
                return $this->redirect(['/wonderkide/main/icon']);
            }
        }
        $model->scenario = 'upload';
        return $this->render('icon',[
            'model' => $model
        ]);
    }
    
    public function actionLogo() {
        $model = MainDataModel::find()->where(['type'=>'logo'])->one();
        if(!$model){
            $model = new MainDataModel();
            $model->type = 'logo';
            $model->name = 'logo';
            $model->title = 'in-memory-logo';
            $model->active = 1;
        }
        if ($model->load(Yii::$app->request->post())) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            $old_path = $model->content;
            if (isset($model->imageFile)) {
                $path = '/uploads/img/main/' . date('Ymd-his') . '-logo-' . $model->imageFile->name;
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
                return $this->redirect(['/wonderkide/main/logo']);
            }
        }
        $model->scenario = 'upload';
        return $this->render('logo',[
            'model' => $model
        ]);
    }
    
    public function actionAllowuser(){
        $model = MainDataModel::find()->where(['type'=>'allowuser'])->one();
        if(!$model){
            $model = new MainDataModel();
            $model->type = 'allowuser';
            $model->name = 'allowuser';
            $model->title = 'Username, nickname ห้ามใช้';
            $model->active = 1;
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Update was successful.',
                    'title' => 'Success!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->redirect(['/wonderkide/main/allowuser']);
            }
        }
        return $this->render('allowuser',[
            'model' => $model
        ]);
    }
    public function actionContact(){
        $model = new ContactData();
        $email = MainDataModel::find()->where(['type'=>'email'])->one();
        if($email){
            $model->email = $email->content;
        }
        $phone_1 = MainDataModel::find()->where(['type'=>'phone','name'=>'1'])->one();
        if($phone_1){
            $model->phone_1 = $phone_1->content;
        }
        $phone_2 = MainDataModel::find()->where(['type'=>'phone','name'=>'2'])->one();
        if($phone_2){
            $model->phone_2 = $phone_2->content;
        }
        $address = MainDataModel::find()->where(['type'=>'address'])->one();
        if($address){
            $model->address = $address->content;
        }
        
        if ($model->load(Yii::$app->request->post())) {
            $flag = FALSE;
            if($model->email && $model->email != ''){
                if(!$email){
                    $email = new MainDataModel();
                    $email->type = 'email';
                    $email->name = 'email';
                    $email->title = 'admin email';
                    $email->content = $model->email;
                    $email->active = 1;
                }
                else{
                    $email->content = $model->email;
                }
                if($email->save()){
                    $flag = TRUE;
                }
                else{
                    $flag = FALSE;
                }
            }
            if($model->phone_1 && $model->phone_1 != ''){
                if(!$phone_1){
                    $phone_1 = new MainDataModel();
                    $phone_1->type = 'phone';
                    $phone_1->name = '1';
                    $phone_1->title = 'phone 1';
                    $phone_1->content = $model->phone_1;
                    $phone_1->active = 1;
                }
                else{
                    $phone_1->content = $model->phone_1;
                }
                if($phone_1->save()){
                    $flag = TRUE;
                }
                else{
                    $flag = FALSE;
                }
            }
            if($model->phone_2 && $model->phone_2 != ''){
                if(!$phone_2){
                    $phone_2 = new MainDataModel();
                    $phone_2->type = 'phone';
                    $phone_2->name = '2';
                    $phone_2->title = 'phone 2';
                    $phone_2->content = $model->phone_2;
                    $phone_2->active = 1;
                }
                else{
                    $phone_2->content = $model->phone_2;
                }
                if($phone_2->save()){
                    $flag = TRUE;
                }
                else{
                    $flag = FALSE;
                }
            }
            if($model->address && $model->address != ''){
                if(!$address){
                    $address = new MainDataModel();
                    $address->type = 'address';
                    $address->name = 'address';
                    $address->title = 'address';
                    $address->content = $model->address;
                    $address->active = 1;
                }
                else{
                    $address->content = $model->address;
                }
                if($address->save()){
                    $flag = TRUE;
                }
                else{
                    $flag = FALSE;
                }
            }
            
            if($flag){
                Yii::$app->getSession()->setFlash('success', [
                    'type' => 'success',
                    'duration' => 5000,
                    'icon' => 'fa fa-users',
                    'message' => 'Update was successful.',
                    'title' => 'Success!!',
                    'positonY' => 'top',
                    'positonX' => 'right'
                ]);
                return $this->refresh();
            }
        }
        return $this->render('contact',[
            'model' => $model
        ]);
    }


}
