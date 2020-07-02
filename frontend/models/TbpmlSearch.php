<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbpml;

/**
 * TbpmlSearch represents the model behind the search form of `app\models\Tbpml`.
 */
class TbpmlSearch extends Tbpml
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester', 'prov', 'kab', 'namapml', 'nohp'], 'safe'],
            [['kodepml', 'idjabatan', 'idedcod'], 'integer'],
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
        $query = Tbpml::find();

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
            'kodepml' => $this->kodepml,
            'idjabatan' => $this->idjabatan,
            'idedcod' => $this->idedcod,
        ]);

        $query->andFilterWhere(['like', 'semester', $this->semester])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'kab', $this->kab])
            ->andFilterWhere(['like', 'namapml', $this->namapml])
            ->andFilterWhere(['like', 'nohp', $this->nohp]);

        return $dataProvider;
    }
}
