<?php

namespace app\models;

use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "db_gallery".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $ref
 * @property string $name
 * @property string $title
 * @property string $detail
 * @property string $create_date
 * @property string $update_date
 * @property integer $read
 * @property string $show
 */
class GalleryModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    const UPLOAD_FOLDER = 'uploads/img/gallery';
    
    public static function tableName()
    {
        return 'db_gallery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'ref', 'name', /*'title', 'detail',*/ 'create_date', 'read'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'show', 'banned', 'read'], 'integer'],
            [['create_date'], 'safe'],
            [['ref', 'title'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 256],
            [['detail'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'ref' => 'Ref',
            'name' => 'ชื่อแกลอรี่',
            'title' => 'คำอธิบาย',
            'detail' => 'คำอธิบายเพิ่มเติม',
            'create_date' => 'Create Date',
            'read' => 'อ่าน',
            'show' => 'เปิดเป็นสาธารณะ',
        ];
    }
    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/'.Yii::$app->user->id.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/'.Yii::$app->user->id.'/';
    }

    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Uploads::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }

    public function getProvince()
    {
      return $this->hasOne(Province::className(),['PROVINCE_ID'=>'province_id']);
    }
    
    public function getTags() {
        $model = GalleryModel::findAll(['id_user'=>Yii::$app->user->id]);
        $data = [];
        foreach ($model as $value) {
            $data[$value->id] = $value->name;
        }
        return $data;       
    }
    public function getNameByTags($tags) {
        if($tags && $tags != ''){
            $tagVal = explode(',', $tags);
            $data = [];
            foreach ($tagVal as $key => $value) {
                $model = GalleryModel::findOne($value);
                $data[$key] = $model->name;
            }

            return implode(',', $data);
        }
        return null;
    }
    
    public function topGallery() {
        $model = GalleryModel::find()->where(['show'=>1, 'banned'=>0])->orderBy(['read' => SORT_DESC])->limit(4)->all();
        if($model){
            return $model;
        }
        return null;
    }
}