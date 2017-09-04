<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LogExpModel;

/**
 * LogExpSearchModel represents the model behind the search form about `app\models\LogExpModel`.
 */
class LogExpSearchModel extends LogExpModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_admin', 'id_cat', 'exp', 'active'], 'integer'],
            [['category', 'detail', 'create_time'], 'safe'],
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
        $query = LogExpModel::find();

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
            'id_admin' => $this->id_admin,
            'id_cat' => $this->id_cat,
            'exp' => $this->exp,
            'create_time' => $this->create_time,
            'active' => $this->active,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
    
    public function searchByFilter($params, $date_from,$date_to,$user,$category) {
        $query = LogExpModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        $query->andFilterWhere(['category'=> $category]);

        $query->andFilterWhere([
            'id' => $this->id,
            'id_user' => $user ? $user : $this->id_user,
            'id_admin' => $this->id_admin,
            'id_cat' => $this->id_cat,
            'exp' => $this->exp,
            'create_time' => $this->create_time,
            'active' => 0,
        ]);

        $query->andFilterWhere(['between', 'create_time', $date_from, $date_to]);
        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'detail', $this->detail]);
        

        return $dataProvider;
    }
}