<?php

namespace app\models;

use Yii;
use app\models\UserModel;

/**
 * This is the model class for table "db_comment".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_parent
 * @property integer $id_cat
 * @property string $category
 * @property string $content
 * @property string $create_time
 * @property string $update_time
 * @property string $create_ip
 * @property integer $banned
 * @property integer $feeling
 */
class CommentModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_parent', 'id_cat', 'category', 'content', 'create_time', 'create_ip', 'feeling'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'id_parent', 'id_cat', 'banned', 'feeling'], 'integer'],
            [['content'], 'string'],
            [['create_time', 'update_time'], 'safe'],
            [['category', 'create_ip'], 'string', 'max' => 64],
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
            'id_parent' => 'Id Parent',
            'id_cat' => 'Id Cat',
            'category' => 'Category',
            'content' => 'โพสต์',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
            'create_ip' => 'Create Ip',
        ];
    }
    
    public function countComment($id_cat, $category) {
        $count = CommentModel::find()->where(['id_cat'=>$id_cat, 'category'=>$category])->count();
        return $count;
    }
    
    
    // test join
    public function getUsers()
    {
      return $this->hasMany(UserModel::className(), ['id' => 'id_user']);
    }
}