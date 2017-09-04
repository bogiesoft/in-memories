<?php

namespace app\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "db_main_data".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $title
 * @property string $content
 * @property integer $active
 */
class MainDataModel extends \yii\db\ActiveRecord
{
    
    public $imageFile;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_main_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'title', 'content', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['active'], 'integer'],
            [['type', 'name', 'title'], 'string', 'max' => 128],
            [['content'], 'string', 'max' => 512],
            [['imageFile'], 'file', 'skipOnEmpty' => TRUE, 'extensions' => 'jpg, gif, png, ico'],
            ['imageFile', 'required', 'on' => 'upload']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'title' => 'Title',
            'content' => 'Content',
            'active' => 'Active',
        ];
    }
    
    public function upload($path) {
        if ($this->validate()) {
            $this->imageFile->saveAs(Yii::$app->basePath . '/web' . $path);
            return true;
        } else {
            return false;
        }
    }
    public function delImage($path) {
        if(file_exists(getcwd().$path)){
            unlink(getcwd().$path);
        }
    }
    
    public function getIcon() {
        $model = MainDataModel::find()->where(['type'=>'icon'])->one();
        if($model){
            return $model->content;
        }
        return Yii::$app->assetManager->getPublishedUrl('@WDAsset') . "/images/in-memo-icon.ico";
    }
    public function getLogo() {
        $model = MainDataModel::find()->where(['type'=>'logo'])->one();
        if($model){
            return Html::img($model->content, ['alt'=>$model->title]);
        }
        return Html::img(Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/logo-v1-2.png', ['alt'=>'In Memory']);
    }
    public function getLogoUrl() {
        $model = MainDataModel::find()->where(['type'=>'logo'])->one();
        if($model){
            return $model->content;
        }
        return Yii::$app->assetManager->getPublishedUrl('@WDAsset') . "/images/logo-v1-2.png";
    }
    
    public function getContentByType($type) {
        $model = MainDataModel::find()->where(['type'=>$type])->one();
        if($model){
            return $model;
        }
        return null;
    }
    
    public function getFeeling() {
        $model = MainDataModel::find()->where(['type'=>'feeling-icon'])->one();
        if($model && file_exists(getcwd().$model->content)){
            return $model->content;
        }
        return Yii::$app->assetManager->getPublishedUrl('@WDAsset') . "/images/feeling.png";
    }
    public function getFeelingActive() {
        $model = MainDataModel::find()->where(['type'=>'feeling-icon-active'])->one();
        if($model && file_exists(getcwd().$model->content)){
            return $model->content;
        }
        return Yii::$app->assetManager->getPublishedUrl('@WDAsset') . "/images/feeling-active.png";
    }
}