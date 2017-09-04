<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LikeDataModel;

/**
 * LikeDataSearchModel represents the model behind the search form about `app\models\LikeDataModel`.
 */
class LikeDataSearchModel extends LikeDataModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_like_cat', 'like_value', 'active'], 'integer'],
            [['main_category', 'sub_category', 'create_date'], 'safe'],
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
        $query = LikeDataModel::find();

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
            'id_user' => $this->id_user,
            'id_like_cat' => $this->id_like_cat,
            'like_value' => $this->like_value,
            'create_date' => $this->create_date,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'main_category', $this->main_category])
            ->andFilterWhere(['like', 'sub_category', $this->sub_category]);

        return $dataProvider;
    }
    public function searchNonActive($params)
    {
        $query = LikeDataModel::find();

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
            'id_user' => $this->id_user,
            'id_like_cat' => $this->id_like_cat,
            'like_value' => 1,
            'create_date' => $this->create_date,
            'active' => 0,
        ]);

        $query->andFilterWhere(['like', 'main_category', $this->main_category])
            ->andFilterWhere(['like', 'sub_category', $this->sub_category]);

        return $dataProvider;
    }
}