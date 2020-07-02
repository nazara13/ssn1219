<?php

namespace app\models;
use Yii;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tbmonitoring;

/**
 * TbmonitoringSearch represents the model behind the search form of `app\models\Tbmonitoring`.
 */
class TbmonitoringSearch extends Tbmonitoring
{
    /**
     * {@inheritdoc}
     */

    public $totalruta;

    public function rules()
    {
        return [
            [['kodepml', 'kodepcl'], 'integer'],
            [['nks', 'ruta1', 'ruta2', 'ruta3', 'ruta4', 'ruta5', 'ruta6', 'ruta7', 'ruta8', 'ruta9', 'ruta10', 'Total', 'totalruta'], 'safe'],
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
        $query = Tbmonitoring::find();

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
            'kodepcl' => $this->kodepcl,
        ]);

        $query->andFilterWhere(['like', 'nks', $this->nks])
            ->andFilterWhere(['like', 'ruta1', $this->ruta1])
            ->andFilterWhere(['like', 'ruta2', $this->ruta2])
            ->andFilterWhere(['like', 'ruta3', $this->ruta3])
            ->andFilterWhere(['like', 'ruta4', $this->ruta4])
            ->andFilterWhere(['like', 'ruta5', $this->ruta5])
            ->andFilterWhere(['like', 'ruta6', $this->ruta6])
            ->andFilterWhere(['like', 'ruta7', $this->ruta7])
            ->andFilterWhere(['like', 'ruta8', $this->ruta8])
            ->andFilterWhere(['like', 'ruta9', $this->ruta9])
            ->andFilterWhere(['like', 'ruta10', $this->ruta10])
            ->andFilterWhere(['like', 'Total', $this->Total])
            ->andFilterWhere(['like', 'totalruta', $this->totalruta])
            ->andFilterWhere(['like', 'tbpml.namapml', $this->kodepml]);

        return $dataProvider;
    }
}
