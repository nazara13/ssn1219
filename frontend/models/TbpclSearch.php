<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbpcl;

/**
 * TbpclSearch represents the model behind the search form of `app\models\Tbpcl`.
 */
class TbpclSearch extends Tbpcl
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester', 'prov', 'kab', 'namapcl', 'nohp'], 'safe'],
            [['kodepcl', 'idjabatan'], 'integer'],
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
        $query = Tbpcl::find();

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
            'kodepcl' => $this->kodepcl,
            'idjabatan' => $this->idjabatan,
        ]);

        $query->andFilterWhere(['like', 'semester', $this->semester])
            ->andFilterWhere(['like', 'prov', $this->prov])
            ->andFilterWhere(['like', 'kab', $this->kab])
            ->andFilterWhere(['like', 'namapcl', $this->namapcl])
            ->andFilterWhere(['like', 'nohp', $this->nohp]);

        return $dataProvider;
    }
}
