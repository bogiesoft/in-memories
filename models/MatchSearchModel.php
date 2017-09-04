<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MatchModel;

/**
 * MatchSearchModel represents the model behind the search form about `app\models\MatchModel`.
 */
class MatchSearchModel extends MatchModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_match', 'id_league', 'h_score', 'a_score', 'active'], 'integer'],
            [['home', 'away', 'play_time', 'bet', 'bet_team', 'comment'], 'safe'],
            [['h_odds', 'a_odds'], 'number'],
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
        $query = MatchModel::find();

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
            'id_match' => $this->id_match,
            'id_league' => $this->id_league,
            'h_odds' => $this->h_odds,
            'a_odds' => $this->a_odds,
            'h_score' => $this->h_score,
            'a_score' => $this->a_score,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'home', $this->home])
            ->andFilterWhere(['like', 'away', $this->away])
            ->andFilterWhere(['like', 'play_time', $this->play_time])
            ->andFilterWhere(['like', 'bet', $this->bet])
            ->andFilterWhere(['like', 'bet_team', $this->bet_team])
            ->andFilterWhere(['like', 'comment', $this->comment]);

        return $dataProvider;
    }
    
    public function searchActive($params)
    {
        $query = MatchModel::find();

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
            'id_match' => $this->id_match,
            'id_league' => $this->id_league,
            'h_odds' => $this->h_odds,
            'a_odds' => $this->a_odds,
            'h_score' => $this->h_score,
            'a_score' => $this->a_score,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'home', $this->home])
            ->andFilterWhere(['like', 'away', $this->away])
            ->andFilterWhere(['like', 'play_time', $this->play_time])
            ->andFilterWhere(['like', 'bet', $this->bet])
            ->andFilterWhere(['like', 'bet_team', $this->bet_team])
            ->andFilterWhere(['like', 'comment', $this->comment]);
        $query->orderBy(['play_time' => SORT_DESC]);
        return $dataProvider;
    }
}