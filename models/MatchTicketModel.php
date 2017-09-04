<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_match_ticket".
 *
 * @property integer $id_team_odds
 * @property integer $id_match
 * @property integer $id_user
 * @property integer $team_selected
 * @property string $update_time
 * @property string $ip_address
 */
class MatchTicketModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_match_ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_match', 'id_user', 'id_game_log', 'step', 'team_selected', 'rate', 'update_time', 'ip_address'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_match', 'id_user', 'id_game_log', 'step'], 'integer'],
            [['rate'], 'number'],
            [['update_time'], 'safe'],
            [['team_selected'], 'string', 'max' => 1],
            [['ip_address'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_match_ticket' => 'Id match ticket',
            'id_match' => 'Id Match',
            'id_user' => 'Id User',
            'id_game_log' => 'Id game log',
            'step' => 'Step',
            'team_selected' => 'Team Selected',
            'rate' => 'rate',
            'update_time' => 'Update Time',
            'ip_address' => 'Ip Address',
        ];
    }
}