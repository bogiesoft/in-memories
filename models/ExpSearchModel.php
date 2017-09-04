<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpModel;

/**
 * ExpSearchModel represents the model behind the search form about `app\models\ExpModel`.
 */
class ExpSearchModel extends ExpModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exp', 'count_bonus', 'exp_bonus'], 'integer'],
            [['category', 'other'], 'safe'],
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
        $query = ExpModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'exp' => $this->exp,
            'count_bonus' => $this->count_bonus,
            'exp_bonus' => $this->exp_bonus,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'other', $this->other]);

        return $dataProvider;
    }
}