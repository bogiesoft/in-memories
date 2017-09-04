<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_log_exp".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_admin
 * @property integer $id_cat
 * @property string $category
 * @property string $detail
 * @property integer $exp
 * @property string $create_time
 * @property integer $active
 */
class LogExpModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_log_exp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_cat', 'category', 'detail', 'exp', 'create_time', 'active'], 'required'],
            [['id_user', 'id_admin', 'id_cat', 'exp', 'active'], 'integer'],
            [['create_time'], 'safe'],
            [['category'], 'string', 'max' => 64],
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
            'id_admin' => 'Id Admin',
            'id_cat' => 'Id Cat',
            'category' => 'Category',
            'detail' => 'Detail',
            'exp' => 'Exp',
            'create_time' => 'Create Time',
            'active' => 'Active',
        ];
    }
}