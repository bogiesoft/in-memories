<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MatchTicketModel;

/**
 * MatchTicketSearchModel represents the model behind the search form about `app\models\MatchTicketModel`.
 */
class MatchTicketSearchModel extends MatchTicketModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_match_ticket', 'id_match', 'id_user', 'id_game_log', 'step', 'team_selected'], 'integer'],
            [['rate'], 'number'],
            [['update_time', 'ip_address'], 'safe'],
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
        $query = MatchTicketModel::find();

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
            'id_match_ticket' => $this->id_match_ticket,
            'id_match' => $this->id_match,
            'id_user' => $this->id_user,
            'id_game_log' => $this->id_game_log,
            'step' => $this->step,
            'team_selected' => $this->team_selected,
            'rate' => $this->rate,
            'update_time' => $this->update_time,
        ]);

        $query->andFilterWhere(['like', 'ip_address', $this->ip_address]);

        return $dataProvider;
    }
}