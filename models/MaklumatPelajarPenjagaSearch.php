<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaklumatPelajarPenjaga;

/**
 * MaklumatPelajarPenjagaSearch represents the model behind the search form about `app\models\MaklumatPelajarPenjaga`.
 */
class MaklumatPelajarPenjagaSearch extends MaklumatPelajarPenjaga
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'pusat_pengajian_id', 'gaji_bapa', 'gaji_ibu', 'enter_by', 'update_by'], 'integer'],
            [['nama_pelajar', 'jantina', 'tarikh_lahir', 'tempat_lahir', 'no_surat_beranak', 'no_mykid', 'sesi_pengajian', 'tarikh_masuk', 'tahun_mula', 'alamat_rumah', 'SPRA', 'PSRA', 'status', 'warganegara', 'tahun_lewat', 'alumni', 'nama_bapa', 'no_kad_pengenalan_bapa', 'pekerjaan_bapa_penjaga', 'no_tel_bapa', 'no_hp_bapa', 'alamat_majikan_bapa_penjaga', 'nama_ibu', 'no_kad_pengenalan_ibu', 'pekerjaan_ibu', 'no_tel_ibu', 'no_hp_ibu', 'alamat_majikan_ibu', 'date_create', 'date_update'], 'safe'],
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
        $query = MaklumatPelajarPenjaga::find();

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
            'pusat_pengajian_id' => $this->pusat_pengajian_id,
            'gaji_bapa' => $this->gaji_bapa,
            'gaji_ibu' => $this->gaji_ibu,
            'date_create' => $this->date_create,
            'date_update' => $this->date_update,
            'enter_by' => $this->enter_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'nama_pelajar', $this->nama_pelajar])
            ->andFilterWhere(['like', 'jantina', $this->jantina])
            ->andFilterWhere(['like', 'tarikh_lahir', $this->tarikh_lahir])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'no_surat_beranak', $this->no_surat_beranak])
            ->andFilterWhere(['like', 'no_mykid', $this->no_mykid])
            ->andFilterWhere(['like', 'sesi_pengajian', $this->sesi_pengajian])
            ->andFilterWhere(['like', 'tarikh_masuk', $this->tarikh_masuk])
            ->andFilterWhere(['like', 'tahun_mula', $this->tahun_mula])
            ->andFilterWhere(['like', 'alamat_rumah', $this->alamat_rumah])
            ->andFilterWhere(['like', 'SPRA', $this->SPRA])
            ->andFilterWhere(['like', 'PSRA', $this->PSRA])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'warganegara', $this->warganegara])
            ->andFilterWhere(['like', 'tahun_lewat', $this->tahun_lewat])
            ->andFilterWhere(['like', 'alumni', $this->alumni])
            ->andFilterWhere(['like', 'nama_bapa', $this->nama_bapa])
            ->andFilterWhere(['like', 'no_kad_pengenalan_bapa', $this->no_kad_pengenalan_bapa])
            ->andFilterWhere(['like', 'pekerjaan_bapa_penjaga', $this->pekerjaan_bapa_penjaga])
            ->andFilterWhere(['like', 'no_tel_bapa', $this->no_tel_bapa])
            ->andFilterWhere(['like', 'no_hp_bapa', $this->no_hp_bapa])
            ->andFilterWhere(['like', 'alamat_majikan_bapa_penjaga', $this->alamat_majikan_bapa_penjaga])
            ->andFilterWhere(['like', 'nama_ibu', $this->nama_ibu])
            ->andFilterWhere(['like', 'no_kad_pengenalan_ibu', $this->no_kad_pengenalan_ibu])
            ->andFilterWhere(['like', 'pekerjaan_ibu', $this->pekerjaan_ibu])
            ->andFilterWhere(['like', 'no_tel_ibu', $this->no_tel_ibu])
            ->andFilterWhere(['like', 'no_hp_ibu', $this->no_hp_ibu])
            ->andFilterWhere(['like', 'alamat_majikan_ibu', $this->alamat_majikan_ibu]);

        return $dataProvider;
    }
}
