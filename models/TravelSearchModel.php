<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TravelModel;

/**
 * TravelSearchModel represents the model behind the search form about `app\models\TravelModel`.
 */
class TravelSearchModel extends TravelModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_travel', 'id_user_create', 'id_user_update', 'rating'], 'integer'],
            [['title', 'content', 'create_post', 'update_post', 'image'], 'safe'],
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
        $query = TravelModel::find();

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
            'id_travel' => $this->id_travel,
            'id_user_create' => $this->id_user_create,
            'id_user_update' => $this->id_user_update,
            'rating' => $this->rating,
            'create_post' => $this->create_post,
            'update_post' => $this->update_post,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}