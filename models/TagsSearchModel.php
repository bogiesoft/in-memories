<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TagsModel;

/**
 * TagsSearchModel represents the model behind the search form about `app\models\TagsModel`.
 */
class TagsSearchModel extends TagsModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tag', 'group', 'parent_id'], 'integer'],
            [['name_th', 'name_en', 'category'], 'safe'],
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
        $query = TagsModel::find();

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
            'id_tag' => $this->id_tag,
            'group' => $this->group,
            'parent_id' => 0,
        ]);

        $query->andFilterWhere(['like', 'name_th', $this->name_th])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
    
    public function searchChild($params, $parent)
    {
        $query = TagsModel::find();

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
            'id_tag' => $this->id_tag,
            'group' => $this->group,
            'parent_id' => $parent,
        ]);

        $query->andFilterWhere(['like', 'name_th', $this->name_th])
            ->andFilterWhere(['like', 'name_en', $this->name_en])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}