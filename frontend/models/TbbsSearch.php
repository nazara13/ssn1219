<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbbs;

/**
 * TbbsSearch represents the model behind the search form of `app\models\Tbbs`.
 */
class TbbsSearch extends Tbbs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prov', 'kab', 'kec', 'desa', 'bs', 'nmprov', 'nmkab', 'nmkec', 'nmdesa', 'idbs', 'nks'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tbbs::find();

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
        $query->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'kab', $this->kab])
            ->andFilterWhere(['like', 'kec', $this->kec])
            ->andFilterWhere(['like', 'desa', $this->desa])
            ->andFilterWhere(['like', 'bs', $this->bs])
            ->andFilterWhere(['like', 'nmprov', $this->nmprov])
            ->andFilterWhere(['like', 'nmkab', $this->nmkab])
            ->andFilterWhere(['like', 'nmkec', $this->nmkec])
            ->andFilterWhere(['like', 'nmdesa', $this->nmdesa])
            ->andFilterWhere(['like', 'idbs', $this->idbs])
            ->andFilterWhere(['like', 'nks', $this->nks]);

        return $dataProvider;
    }
}
