<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_setting".
 *
 * @property integer $id
 * @property string $type
 * @property string $name
 * @property string $data
 * @property integer $setting
 */
class SettingModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'name', 'data', 'setting'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['setting'], 'integer'],
            [['type'], 'string', 'max' => 64],
            [['name'], 'string', 'max' => 128],
            [['data'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'ประเภท',
            'name' => 'ชื่อ/จำนวน/ปริมาณ',
            'data' => 'รายละเอียด',
            'setting' => 'ตั้งค่า',
        ];
    }
    
    public function getPoint() {
        $model = SettingModel::find()->where(['type'=>'post_point'])->one();
        if($model){
            return $model->name;
        }
        return 0;
    }
    
    public function checkSetting($type) {
        $model = SettingModel::find()->where(['type'=>$type])->one();
        if($model && $model->setting==1){
            return true;
        }
        return FALSE;
    }
}