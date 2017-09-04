<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LogGameModel;

/**
 * LogGameSearchModel represents the model behind the search form about `app\models\LogGameModel`.
 */
class LogGameSearchModel extends LogGameModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_game_log', 'id_user', 'game_type', 'play_count', 'zeny', 'status'], 'integer'],
            [['play_date', 'play_ip'], 'safe'],
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
        $query = LogGameModel::find();

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
            'id_game_log' => $this->id_game_log,
            'id_user' => $this->id_user,
            'game_type' => $this->game_type,
            'play_count' => $this->play_count,
            'zeny' => $this->zeny,
            'play_date' => $this->play_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'play_ip', $this->play_ip]);

        return $dataProvider;
    }
    
    public function noneActive($params)
    {
        $query = LogGameModel::find()->orderBy(['play_date' => SORT_DESC]);

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
            'id_game_log' => $this->id_game_log,
            'id_user' => $this->id_user,
            'game_type' => $this->game_type,
            'play_count' => $this->play_count,
            'zeny' => $this->zeny,
            'play_date' => $this->play_date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'play_ip', $this->play_ip]);
        return $dataProvider;
    }
}