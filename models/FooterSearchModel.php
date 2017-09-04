<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FooterModel;

/**
 * FooterSearchModel represents the model behind the search form about `app\models\FooterModel`.
 */
class FooterSearchModel extends FooterModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_footer', 'active', 'sorting'], 'integer'],
            [['type', 'title', 'detail_1', 'detail_2', 'detail_3', 'url'], 'safe'],
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
        //If(!isset($params['sort'])){
            $query = FooterModel::find()->orderBy(['sorting' => SORT_ASC]);
        //}
        //else{
        //    $query = FooterModel::find();
        //}

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
            'id_footer' => $this->id_footer,
            'active' => $this->active,
            'sorting' => $this->sorting,
        ]);

        $query->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'detail_1', $this->detail_1])
            ->andFilterWhere(['like', 'detail_2', $this->detail_2])
            ->andFilterWhere(['like', 'detail_3', $this->detail_3])
            ->andFilterWhere(['like', 'url', $this->url]);

        return $dataProvider;
    }
}