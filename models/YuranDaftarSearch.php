<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YuranDaftar;

/**
 * YuranDaftarSearch represents the model behind the search form about `app\models\YuranDaftar`.
 */
class YuranDaftarSearch extends YuranDaftar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pelajar', 'bulan', 'tahap_pelajar', 'guru_kelas', 'tahun'], 'integer'],
            [['tarikh_bayaran', 'no_resit', 'jenis_yuran', 'status_yuran'], 'safe'],
            [['jumlah_yuran', 'yuran_tertunggak'], 'number'],
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
        $query = YuranDaftar::find();

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
            'id_pelajar' => $this->id_pelajar,
            'jumlah_yuran' => $this->jumlah_yuran,
            'yuran_tertunggak' => $this->yuran_tertunggak,
            'bulan' => $this->bulan,
            'tahap_pelajar' => $this->tahap_pelajar,
            'guru_kelas' => $this->guru_kelas,
            'tahun' => $this->tahun,
        ]);

        $query->andFilterWhere(['like', 'tarikh_bayaran', $this->tarikh_bayaran])
            ->andFilterWhere(['like', 'no_resit', $this->no_resit])
            ->andFilterWhere(['like', 'jenis_yuran', $this->jenis_yuran])
            ->andFilterWhere(['like', 'status_yuran', $this->status_yuran]);

        return $dataProvider;
    }
}
