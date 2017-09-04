<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LeagueScoresModel;

/**
 * LeagueScoreSearch represents the model behind the search form about `app\models\League_scores`.
 */
class LeagueScoreSearch extends LeagueScoresModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'league_id', 'no', 'play', 'h_win', 'h_draw', 'h_lost', 'h_gfor', 'h_against', 'a_win', 'a_draw', 'a_lost', 'a_gfor', 'a_against', 'point', 'type'], 'integer'],
            [['team_name', 'goal_dif', 'form', 'group_cup', 'season'], 'safe'],
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
        $query = LeagueScoresModel::find();

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
            'id' => $this->id,
            'league_id' => $this->league_id,
            'no' => $this->no,
            'play' => $this->play,
            'h_win' => $this->h_win,
            'h_draw' => $this->h_draw,
            'h_lost' => $this->h_lost,
            'h_gfor' => $this->h_gfor,
            'h_against' => $this->h_against,
            'a_win' => $this->a_win,
            'a_draw' => $this->a_draw,
            'a_lost' => $this->a_lost,
            'a_gfor' => $this->a_gfor,
            'a_against' => $this->a_against,
            'point' => $this->point,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'team_name', $this->team_name])
            ->andFilterWhere(['like', 'goal_dif', $this->goal_dif])
            ->andFilterWhere(['like', 'form', $this->form])
            ->andFilterWhere(['like', 'group_cup', $this->group_cup])
            ->andFilterWhere(['like', 'season', $this->season]);

        return $dataProvider;
    }
    
    public function searchByLeague($params, $id)
    {
        $query = LeagueScoresModel::find();

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
            'id' => $this->id,
            'league_id' => $id,
            'no' => $this->no,
            'play' => $this->play,
            'h_win' => $this->h_win,
            'h_draw' => $this->h_draw,
            'h_lost' => $this->h_lost,
            'h_gfor' => $this->h_gfor,
            'h_against' => $this->h_against,
            'a_win' => $this->a_win,
            'a_draw' => $this->a_draw,
            'a_lost' => $this->a_lost,
            'a_gfor' => $this->a_gfor,
            'a_against' => $this->a_against,
            'point' => $this->point,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['like', 'team_name', $this->team_name])
            ->andFilterWhere(['like', 'goal_dif', $this->goal_dif])
            ->andFilterWhere(['like', 'form', $this->form])
            ->andFilterWhere(['like', 'group_cup', $this->group_cup])
            ->andFilterWhere(['like', 'season', $this->season]);

        return $dataProvider;
    }
}