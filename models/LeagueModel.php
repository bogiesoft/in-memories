<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_league".
 *
 * @property integer $id_league
 * @property string $league_name_en
 * @property string $league_name_th
 * @property integer $api_get_match
 * @property integer $api_get_scores
 * @property string $link_get_scores
 * @property string $link_get_topscore
 * @property string $link_get_fixt
 * @property string $link_get_result
 * @property string $league_img
 */
class LeagueModel extends \yii\db\ActiveRecord
{
    const season = '2015-2016';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_league';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['league_name_en', 'league_name_th', 'api_get_match', /*'link_get_odds', 'link_get_scores', 'link_get_topscore', 'link_get_fixt', 'link_get_result',*/ 'league_img'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['api_get_match', 'api_get_scores'], 'integer'],
            [['link_get_odds','link_get_scores', 'link_get_topscore', 'link_get_fixt', 'link_get_result', 'link_get_result_sub'], 'string'],
            [['league_name_en', 'league_name_th', 'league_img'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_league' => 'Id League',
            'league_name_en' => 'League Name En',
            'league_name_th' => 'League Name Th',
            'api_get_match' => 'Api Get Match',
            'api_get_scores' => 'Api Get Scores',
            'link_get_odds' => 'Link Get Odds',
            'link_get_scores' => 'Link Get Scores',
            'link_get_topscore' => 'Link Get Topscore',
            'link_get_fixt' => 'Link Get Fixt',
            'link_get_result' => 'Link Get Result',
            'link_get_result_sub' => 'Link Get Result sub',
            'league_img' => 'League Img',
        ];
    }
    public function getLeagueSelected() {
        $league = LeagueModel::find()->all();
        $select = [];
        for($i=0;$i<count($league);$i++){
            if($league[$i]['link_get_odds']){
                $select[$league[$i]['id_league']] = $league[$i]['league_name_en'];
            }
        }
        return $select;
    }
}