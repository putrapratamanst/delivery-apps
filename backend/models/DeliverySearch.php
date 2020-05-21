<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Delivery;

/**
 * DeliverySearch represents the model behind the search form of `backend\models\Delivery`.
 */
class DeliverySearch extends Delivery
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_retur'], 'integer'],
            [['nama', 'nomor_barcode', 'alamat', 'pengantar', 'tanggal_terima', 'pp25', 'pp15', 'tanggal_setor', 'no_telephone'], 'safe'],
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
        $query = Delivery::find();
        if(empty($params) || empty($params['DeliverySearch']['nomor_barcode'])){
            $query = Delivery::find()->where(['id' => NULL]);
        }

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]]
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nomor_barcode', $this->nomor_barcode])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pengantar', $this->pengantar])
            ->andFilterWhere(['like', 'tanggal_terima', $this->tanggal_terima])
            ->andFilterWhere(['like', 'tanggal_setor', $this->tanggal_setor])
            ->andFilterWhere(['like', 'pp25', $this->pp25])
            ->andFilterWhere(['like', 'pp15', $this->pp15]);
            
        return $dataProvider;
    }

    public function searchTerbuka($params)
    {
        $query = Delivery::find()->where(['pengantar'=> NULL])->andWhere(['tanggal_setor'=> NULL])->andWhere(['is_retur' => NULL]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]]
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nomor_barcode', $this->nomor_barcode])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pengantar', $this->pengantar])
            ->andFilterWhere(['like', 'tanggal_terima', $this->tanggal_terima])
            ->andFilterWhere(['like', 'tanggal_setor', $this->tanggal_setor])
            ->andFilterWhere(['like', 'pp25', $this->pp25])
            ->andFilterWhere(['like', 'pp15', $this->pp15]);
            
        return $dataProvider;
    }

    public function searchDikirim($params)
    {
        $query = Delivery::find()->where(['not', ['pengantar'=> NULL]])->andWhere(['tanggal_setor'=> NULL])->andWhere(['is_retur' => NULL]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]]
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nomor_barcode', $this->nomor_barcode])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pengantar', $this->pengantar])
            ->andFilterWhere(['like', 'tanggal_terima', $this->tanggal_terima])
            ->andFilterWhere(['like', 'tanggal_setor', $this->tanggal_setor])
            ->andFilterWhere(['like', 'pp25', $this->pp25])
            ->andFilterWhere(['like', 'pp15', $this->pp15]);
            
        return $dataProvider;
    }

    public function searchLunas($params)
    {
        $query = Delivery::find()->where(['NOT', ['pengantar' => ""]])->andWhere(['NOT', ['tanggal_setor' => ""]]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]]
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nomor_barcode', $this->nomor_barcode])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pengantar', $this->pengantar])
            ->andFilterWhere(['like', 'tanggal_terima', $this->tanggal_terima])
            ->andFilterWhere(['like', 'tanggal_setor', $this->tanggal_setor])
            ->andFilterWhere(['like', 'pp25', $this->pp25])
            ->andFilterWhere(['like', 'pp15', $this->pp15]);

        return $dataProvider;
    }

    public function searchRetur($params)
    {
        $query = Delivery::find()->where(['not',['pengantar' => NULL]])
            ->andWhere(['tanggal_setor' => NULL])
            ->andWhere(['is_retur' => true]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'  => ['defaultOrder' => ['id' => SORT_DESC]]
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
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'nomor_barcode', $this->nomor_barcode])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'pengantar', $this->pengantar])
            ->andFilterWhere(['like', 'tanggal_terima', $this->tanggal_terima])
            ->andFilterWhere(['like', 'tanggal_setor', $this->tanggal_setor])
            ->andFilterWhere(['like', 'pp25', $this->pp25])
            ->andFilterWhere(['like', 'pp15', $this->pp15]);

        return $dataProvider;
    }

}
