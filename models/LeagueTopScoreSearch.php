<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LeagueTopScoreModel;

/**
 * LeagueTopScoreSearch represents the model behind the search form about `app\models\LeagueTopScoreModel`.
 */
class LeagueTopScoreSearch extends LeagueTopScoreModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_top_score', 'id_league', 'rank', 'goal'], 'integer'],
            [['player', 'team', 'season'], 'safe'],
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
    public function search($params, $l_id)
    {
        if(isset($params['sort'])){
            $query = LeagueTopScoreModel::find();
        }
        else{
            $query = LeagueTopScoreModel::find()->orderBy(['goal' => SORT_DESC]);
        }

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
            'id_top_score' => $this->id_top_score,
            'id_league' => $l_id,
            'rank' => $this->rank,
            'goal' => $this->goal,
        ]);

        $query->andFilterWhere(['like', 'player', $this->player])
            ->andFilterWhere(['like', 'team', $this->team])
            ->andFilterWhere(['like', 'season', $this->season]);

        return $dataProvider;
    }
}