<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LeagueModel;

/**
 * LeagueSearchModel represents the model behind the search form about `app\models\LeagueModel`.
 */
class LeagueSearchModel extends LeagueModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_league', 'api_get_match', 'api_get_scores'], 'integer'],
            [['league_name_en', 'league_name_th', 'link_get_odds', 'link_get_scores', 'link_get_topscore', 'link_get_fixt', 'link_get_result', 'link_get_result_sub', 'league_img'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LeagueModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_league' => $this->id_league,
            'api_get_match' => $this->api_get_match,
            'api_get_scores' => $this->api_get_scores,
        ]);

        $query->andFilterWhere(['like', 'league_name_en', $this->league_name_en])
            ->andFilterWhere(['like', 'league_name_th', $this->league_name_th])
            ->andFilterWhere(['like', 'link_get_odds', $this->link_get_odds])
            ->andFilterWhere(['like', 'link_get_scores', $this->link_get_scores])
            ->andFilterWhere(['like', 'link_get_topscore', $this->link_get_topscore])
            ->andFilterWhere(['like', 'link_get_fixt', $this->link_get_fixt])
            ->andFilterWhere(['like', 'link_get_result', $this->link_get_result])
                ->andFilterWhere(['like', 'link_get_result_sub', $this->link_get_result_sub])
            ->andFilterWhere(['like', 'league_img', $this->league_img]);

        return $dataProvider;
    }
}