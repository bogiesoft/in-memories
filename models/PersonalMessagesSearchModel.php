<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PersonalMessagesModel;

/**
 * PersonalMessagesSearchModel represents the model behind the search form about `app\models\PersonalMessagesModel`.
 */
class PersonalMessagesSearchModel extends PersonalMessagesModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user_from', 'id_user_to', 'read', 'show_sent', 'delete'], 'integer'],
            [['title', 'detail', 'create_time', 'update_time'], 'safe'],
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
        $query = PersonalMessagesModel::find();

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
            'id_user_from' => $this->id_user_from,
            'id_user_to' => $this->id_user_to,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'read' => $this->read,
            'show_sent' => $this->show_sent,
            'delete' => $this->delete,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
    
    public function searchInBox($params)
    {
        $query = PersonalMessagesModel::find();

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
            'id_user_from' => $this->id_user_from,
            'id_user_to' => Yii::$app->user->id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'read' => $this->read,
            'show_sent' => $this->show_sent,
            'delete' => 0,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
    
    public function searchSentBox($params)
    {
        $query = PersonalMessagesModel::find();

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
            'id_user_from' => Yii::$app->user->id,
            'id_user_to' => $this->id_user_to,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'read' => $this->read,
            'show_sent' => 1,
            'delete' => $this->delete,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}