<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Uploadbackup;

/**
 * UploadbackupSearch represents the model behind the search form of `app\models\Uploadbackup`.
 */
class UploadbackupSearch extends Uploadbackup
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idpost', 'id'], 'integer'],
            [['filebackup', 'keterangan', 'dateupload'], 'safe'],
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
        $query = Uploadbackup::find();

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
            'idpost' => $this->idpost,
            //'dateupload' => $this->dateupload,
            'id' => $this->id,
            'DATE(dateupload)'=>$this->dateupload,
        ]);

        $query->andFilterWhere(['like', 'filebackup', $this->filebackup])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
