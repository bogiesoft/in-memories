<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_log_rank".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_admin
 * @property integer $rank
 * @property integer $rank_up
 * @property string $create_date
 */
class LogRankModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_log_rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'id_admin', 'rank', 'rank_up', 'create_date'], 'required'],
            [['id_user', 'id_admin', 'rank', 'rank_up'], 'integer'],
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
            'id_admin' => 'Id Admin',
            'rank' => 'Rank',
            'rank_up' => 'Rank Up',
            'create_date' => 'Create Date',
        ];
    }
}