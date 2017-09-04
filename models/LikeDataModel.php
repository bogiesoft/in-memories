<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_like_data".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_like_cat
 * @property integer $like_value
 * @property string $main_category
 * @property string $sub_category
 * @property string $create_date
 * @property integer $active
 */
class LikeDataModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_like_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_like_cat', 'like_value', 'main_category', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'id_like_cat', 'like_value', 'active'], 'integer'],
            [['main_category', 'sub_category'], 'string', 'max' => 128],
            [['create_date'], 'safe'],
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
            'id_like_cat' => 'Id Like Cat',
            'like_value' => 'Like Value',
            'category' => 'Category',
            'active' => 'Active',
        ];
    }
    
    public function countAllLike($id, $main_cat, $sub_cat) {
        $count = LikeDataModel::find()->where(['like_value' => 1, 'id_like_cat' => $id, 'main_category' => $main_cat, 'sub_category' => $sub_cat])->count();
        return $count;
    }
    public function countAllUnlike($id, $main_cat, $sub_cat) {
        $count = LikeDataModel::find()->where(['like_value' => -1, 'id_like_cat' => $id, 'main_category' => $main_cat, 'sub_category' => $sub_cat])->count();
        return $count;
    }
}