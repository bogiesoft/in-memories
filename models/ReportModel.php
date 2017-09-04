<?php

namespace app\models;

use Yii;
use app\models\SettingModel;

/**
 * This is the model class for table "db_report".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_user_report
 * @property integer $id_cat
 * @property string $category
 * @property string $title
 * @property string $content
 * @property string $create_time
 * @property integer $active
 */
class ReportModel extends \yii\db\ActiveRecord
{
    
    public $username;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_user_report', 'id_cat', 'category', 'title', 'create_time', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'id_user_report', 'id_cat', 'active'], 'integer'],
            [['create_time'], 'safe'],
            [['category'], 'string', 'max' => 128],
            [['title'], 'string', 'max' => 256],
            [['content'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'ผู้รายงาน',
            'id_user_report' => 'รายงานผู้ใช้',
            'id_cat' => 'รหัสหมวดหมู่',
            'category' => 'หมวดหมู่',
            'title' => 'เรื่อง',
            'content' => 'รายละเอียดเพิ่มเติม',
            'create_time' => 'เวลารายงาน',
            'active' => 'ตรวจสอบแล้ว',
            'username' => 'รายงาน',
        ];
    }
    
    public function checkReportPerDay() {
        $count = ReportModel::find()->where(['id_user'=>Yii::$app->user->id])->andWhere(['>=','create_time',date("Y-m-d")])->count();
        $setting = SettingModel::findOne(['type'=>'report_per_day']);
        if($count<=$setting->name){
            return true;
        }
        return false;
    }
}