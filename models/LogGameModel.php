<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_log_game".
 *
 * @property integer $id_game_log
 * @property integer $id_user
 * @property integer $game_type
 * @property integer $play_count
 * @property string $play_date
 * @property string $play_ip
 */
class LogGameModel extends \yii\db\ActiveRecord
{
    public $count;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_log_game';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'game_type', 'play_count', 'play_date', 'play_ip','zeny','status'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'game_type', 'play_count','zeny','status'], 'integer'],
            [['play_date'], 'safe'],
            [['play_ip'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_game_log' => 'Id Game Log',
            'id_user' => 'Id User',
            'game_type' => 'Game Type',
            'play_count' => 'Play Count',
            'zeny' => 'Zeny',
            'play_date' => 'Play Date',
            'play_ip' => 'Play Ip',
            'status' => 'Status',
        ];
    }
    
    public function checkLog($type) {
        $log = LogGameModel::find()->where(['id_user' => Yii::$app->user->id, 'game_type' => $type, 'play_date' => date("Y-m-d")])->orderBy(['play_count' => SORT_DESC])->one();
        if(!$log || $log->play_count < 3){
            return TRUE;
        }
        return FALSE;
    }
    
    public function checkPlayed($type, $date) {
        if($date == null){
            $date = date("Y-m-d");
        }
        $played = LogGameModel::find()->where(['id_user' => Yii::$app->user->id, 'game_type' => $type, 'play_date' => $date, 'status' => 0])->orderBy(['play_count' => SORT_ASC])->all();
        
        return $played;
    }
}