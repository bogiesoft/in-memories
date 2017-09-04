<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_log_data".
 *
 * @property integer $id
 * @property integer $id_admin
 * @property string $type
 * @property string $name
 * @property string $detail
 * @property string $create_date
 * @property integer $active
 */
class LogDataModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_log_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_admin', 'type', 'name', 'detail', 'create_date', 'active'], 'required'],
            [['id_admin', 'active'], 'integer'],
            [['create_date'], 'safe'],
            [['type', 'name'], 'string', 'max' => 64],
            [['detail'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_admin' => 'Id Admin',
            'type' => 'Type',
            'name' => 'Name',
            'detail' => 'Detail',
            'create_date' => 'Create Date',
            'active' => 'Active',
        ];
    }
}