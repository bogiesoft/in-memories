<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_travel".
 *
 * @property integer $id_travel
 * @property integer $id_user
 * @property string $title
 * @property string $content
 * @property integer $rating
 * @property string $update_post
 * @property string $image
 */
class TravelModel extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user_create', 'id_user_update', 'title', 'content', 'rating', 'create_post', 'update_post', 'image'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user_create', 'id_user_update', 'rating'], 'integer'],
            [['create_post', 'update_post'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
            [[ 'content'], 'string', 'max' => 10000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_travel' => 'Id Travel',
            'id_user_create' => 'user create',
            'id_user_update' => 'user update',
            'title' => 'Title',
            'content' => 'Content',
            'rating' => 'Rating',
            'create_post' => 'Create Post',
            'update_post' => 'Update Post',
            'image' => 'Image',
        ];
    }
    
    public function upload($filename) {
        if ($this->validate()) {
            //$this->imageFile->saveAs(Yii::$app->basePath . '/web/uploads/img/review/travel/' . $upTime . '-' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            $this->imageFile->saveAs(Yii::$app->basePath . '/web/uploads/img/review/travel/' . $filename);
            return true;
        } else {
            return false;
        }
    }
    public function delImage($model) {
        unlink(getcwd().'/uploads/img/review/travel/'.$model->image);
    }
    
    /*protected function findModel($id)
    {
        if (($model = TravelModel::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }*/
}