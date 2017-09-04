<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ExpendModel;

/**
 * NoteSearchModel represents the model behind the search form about `app\models\ExpendModel`.
 */
class ExpendSearchModel extends ExpendModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_note', 'id_user', 'status'], 'integer'],
            [['list', 'date', 'tag'], 'safe'],
            [['price', 'amount'], 'number'],
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
    /*public function search($params)
    {
        $query = ExpendModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);
        
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        if($this->date != ''){
            $this->date = $this->date.' 00:00:00';
        }
        $query->andFilterWhere([
            'id_note' => $this->id_note,
            'id_user' => Yii::$app->user->getId(),
            'price' => $this->price,
            'amount' => $this->amount,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'tag', $this->tag])
                ->andFilterWhere(['like', 'list', $this->list]);
        //var_dump($params['sort']);
                //exit();
        if(!isset($params['sort'])){
            $query->orderBy('date');
        }

        return $dataProvider;
    }*/
    
    public function search($params)
    {
        $query = ExpendModel::find();

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
            'id_note' => $this->id_note,
            'id_user' => $this->id_user,
            'price' => $this->price,
            'amount' => $this->amount,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'list', $this->list]);

        return $dataProvider;
    }
    public function searchByUser($params)
    {
        $query = ExpendModel::find();

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
            'id_note' => $this->id_note,
            'id_user' => Yii::$app->user->id,
            'price' => $this->price,
            'amount' => $this->amount,
            'date' => $this->date,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'list', $this->list]);

        return $dataProvider;
    }
    
    public function searchByFilter($params, $tags=null, $date_from=null, $date_to=null, $min_price=null, $max_price=null, $status=null) {
        $query = ExpendModel::find();
        $find_status = null;
        if($status){
            if(in_array(1, $status) && !in_array(-1, $status)){
                $find_status = 1;
                //var_dump($find_status);exit();
            }
            if(!in_array(1, $status) && in_array(-1, $status)){
                $find_status = -1;
                //var_dump($find_status);exit();
            }
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
        if($this->date != ''){
            $this->date = $this->date.' 00:00:00';
        }
        $query->andFilterWhere([
            'id_note' => $this->id_note,
            'id_user' => Yii::$app->user->getId(),
            //'price' => $this->price,
            'amount' => $this->amount,
            //'date' => $date ? $date : $this->date,
            'status' => $find_status ? $find_status : $this->status,
        ]);

        $query->andFilterWhere(['between', 'date', $date_from, $date_to]);
        $query->andFilterWhere(['between', 'price', $min_price, $max_price]);
        
        if($tags){
            $query->andFilterWhere(['or',['tag'=> $tags]]);
        }

        return $dataProvider;
    }
}