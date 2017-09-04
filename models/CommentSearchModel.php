<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CommentModel;

/**
 * CommentSearchModel represents the model behind the search form about `app\models\CommentModel`.
 */
class CommentSearchModel extends CommentModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'id_parent', 'id_cat', 'banned', 'feeling'], 'integer'],
            [['category', 'content', 'create_time', 'update_time', 'create_ip'], 'safe'],
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
        $query = CommentModel::find();

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
            'id_parent' => $this->id_parent,
            'id_cat' => $this->id_cat,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'banned' => $this->banned,
            'feeling' => $this->feeling,
        ]);

        $query->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'create_ip', $this->create_ip]);

        return $dataProvider;
    }
    
    public function searchJoinUser($params)
    {
        $query = CommentModel::find()->joinWith(['users']);
        
        $items = $query
                ->select([
                    'username','db_comment.id','id_user','id_parent','id_cat','category','content','create_ip','create_time','update_time','banned'])
                ->all();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $items,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        /*$items->andFilterWhere([
            'id' => $this->id,
            'id_user' => $this->id_user,
            'id_parent' => $this->id_parent,
            'id_cat' => $this->id_cat,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'banned' => $this->banned,
        ]);*/

        /*$items->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'create_ip', $this->create_ip]);*/

        return $dataProvider;
    }
    
}