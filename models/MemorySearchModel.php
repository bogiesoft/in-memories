<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MemoryModel;

/**
 * MemorySearchModel represents the model behind the search form about `app\models\MemoryModel`.
 */
class MemorySearchModel extends MemoryModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_user', 'read', 'show'], 'integer'],
            [['title', 'content', 'create_time', 'update_time', 'image_thumb', 'gallery_tags', 'video_tags'], 'safe'],
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
        $query = MemoryModel::find();

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
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'read' => $this->read,
            'show' => $this->show,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image_thumb', $this->image_thumb])
            ->andFilterWhere(['like', 'gallery_tags', $this->gallery_tags])
            ->andFilterWhere(['like', 'video_tags', $this->video_tags]);

        return $dataProvider;
    }
    
    public function searchByUser($params, $id)
    {
        $query = MemoryModel::find();

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
            'id_user' => $id,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'read' => $this->read,
            'show' => $this->show,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image_thumb', $this->image_thumb])
            ->andFilterWhere(['like', 'gallery_tags', $this->gallery_tags])
            ->andFilterWhere(['like', 'video_tags', $this->video_tags]);

        return $dataProvider;
    }
}