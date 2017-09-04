<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_gallery_images".
 *
 * @property integer $id
 * @property string $ref
 * @property string $title
 * @property string $detail
 * @property string $file_name
 * @property string $real_name
 * @property string $path
 */
class GalleryImagesModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_gallery_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gallery', 'ref', 'file_name', 'real_name', 'path', 'sorting'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['ref', 'title'], 'string', 'max' => 128],
            [['path'], 'string', 'max' => 256],
            [['detail', 'file_name', 'real_name'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_gallery' => 'ID Gallery',
            'ref' => 'Ref',
            'title' => 'Title',
            'detail' => 'Detail',
            'file_name' => 'File Name',
            'real_name' => 'Real Name',
            'path' => 'Path',
            'sorting' => 'sorting',
        ];
    }
    public function getThumbPath($model) {
        return $path = $model->path.'thumbnail/'.$model->real_name;
    }
    public function getOriginalPath($model) {
        return $path = $model->path.$model->real_name;
    }
    public function getImageFirst($id) {
        $model =  GalleryImagesModel::find()->where(['id_gallery' => $id])->orderBy(['sorting'=>SORT_ASC])->one();
        if($model){
            return GalleryImagesModel::getThumbPath($model);
        }
        return FALSE;
    }
    public function getFromGallery($id) {
        return GalleryImagesModel::findAll(['id_gallery' => $id]);
    }
    public function checkImage($id) {
        return GalleryImagesModel::findAll(['id_gallery' => $id]);
    }
    
    public function getImageFullFirst($id) {
        $model =  GalleryImagesModel::find()->where(['id_gallery' => $id])->orderBy(['sorting'=>SORT_ASC])->one();
        if($model){
            return GalleryImagesModel::getOriginalPath($model);
        }
        return FALSE;
    }
    
}