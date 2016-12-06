<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaklumatKakitangan;

/**
 * MaklumatKakitanganSearch represents the model behind the search form about `app\models\MaklumatKakitangan`.
 */
class MaklumatKakitanganSearch extends MaklumatKakitangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_staf', 'status_pekerjaan', 'tinggi_cm', 'berat_kg', 'peratus_kwsp'], 'integer'],
            [['tarikh_resign', 'foto', 'nama', 'no_kp', 'tarikh_mula_kerja', 'jawatan_sekarang', 'no_pekerja', 'tahfiz', 'alamat_tempat_kerja', 'warganegara', 'tarikh_lahir', 'tempat_lahir', 'alamat_surat_menyurat', 'alamat_tetap', 'no_tel_rumah', 'no_tel_bimbit', 'tahap_kesihatan', 'pengesahan_kesihatan', 'kecacatan', 'nyatakan_kecacatan', 'kumpulan_usrah', 'nama_ketua_usrah', 'unit_usrah', 'no_ahli_abim', 'kksk', 'loan', 'acc_tabung_haji', 'no_kwsp', 'acc_bimb', 'rujukan_tawaran', 'peringkat_gaji', 'tangga_gaji', 'skim_gaji', 'skim_gaji_awal', 'nama_waris', 'hubungan_waris', 'no_tel_waris', 'kelulusan_tertinggi','globalStaff'], 'safe'],
            [['gaji_asas', 'elaun_asas', 'elaun_rumah', 'tabung_gaji', 'tabung_guru', 'sewa_rumah', 'gaji_tahan'], 'number'],
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
        $query = MaklumatKakitangan::find();
                 //->andWhere(['status_pekerjaan'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nama' => SORT_ASC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'no_pekerja' => $this->no_pekerja,
            'peratus_kwsp' => $this->peratus_kwsp,
            'nama' => $this->nama,
        ]);

        $query->orFilterWhere(['like', 'tarikh_resign', $this->globalStaff])
            ->orFilterWhere(['like', 'foto', $this->globalStaff])
            ->orFilterWhere(['like', 'nama', $this->globalStaff])
            ->orFilterWhere(['like', 'no_kp', $this->globalStaff])
            ->orFilterWhere(['like', 'tarikh_mula_kerja', $this->globalStaff])
            ->orFilterWhere(['like', 'jawatan_sekarang', $this->globalStaff])
            ->orFilterWhere(['like', 'no_pekerja', $this->globalStaff])
            ->orFilterWhere(['like', 'tahfiz', $this->globalStaff])
            ->orFilterWhere(['like', 'alamat_tempat_kerja', $this->globalStaff])
            ->orFilterWhere(['like', 'warganegara', $this->globalStaff])
            ->orFilterWhere(['like', 'tarikh_lahir', $this->globalStaff])
            ->orFilterWhere(['like', 'tempat_lahir', $this->globalStaff])
            ->orFilterWhere(['like', 'alamat_surat_menyurat', $this->globalStaff])
            ->orFilterWhere(['like', 'alamat_tetap', $this->globalStaff])
            ->orFilterWhere(['like', 'no_tel_rumah', $this->globalStaff])
            ->orFilterWhere(['like', 'no_tel_bimbit', $this->globalStaff])
            ->orFilterWhere(['like', 'tahap_kesihatan', $this->globalStaff])
            ->orFilterWhere(['like', 'pengesahan_kesihatan', $this->globalStaff])
            ->orFilterWhere(['like', 'kecacatan', $this->globalStaff])
            ->orFilterWhere(['like', 'nyatakan_kecacatan', $this->globalStaff])
            ->orFilterWhere(['like', 'kumpulan_usrah', $this->globalStaff])
            ->orFilterWhere(['like', 'nama_ketua_usrah', $this->globalStaff])
            ->orFilterWhere(['like', 'unit_usrah', $this->globalStaff])
            ->orFilterWhere(['like', 'no_ahli_abim', $this->globalStaff])
            ->orFilterWhere(['like', 'kksk', $this->globalStaff])
            ->orFilterWhere(['like', 'loan', $this->globalStaff])
            ->orFilterWhere(['like', 'acc_tabung_haji', $this->globalStaff])
            ->orFilterWhere(['like', 'no_kwsp', $this->globalStaff])
            ->orFilterWhere(['like', 'acc_bimb', $this->globalStaff])
            ->orFilterWhere(['like', 'rujukan_tawaran', $this->globalStaff])
            ->orFilterWhere(['like', 'peringkat_gaji', $this->globalStaff])
            ->orFilterWhere(['like', 'tangga_gaji', $this->globalStaff])
            ->orFilterWhere(['like', 'skim_gaji', $this->globalStaff])
            ->orFilterWhere(['like', 'skim_gaji_awal', $this->globalStaff])
            ->orFilterWhere(['like', 'nama_waris', $this->globalStaff])
            ->orFilterWhere(['like', 'hubungan_waris', $this->globalStaff])
            ->orFilterWhere(['like', 'no_tel_waris', $this->globalStaff])
            ->orFilterWhere(['like', 'kelulusan_tertinggi', $this->globalStaff]);

        return $dataProvider;
    }
}
