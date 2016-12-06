<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LookupYuran;

/**
 * LookupYuranSearch represents the model behind the search form about `app\models\LookupYuran`.
 */
class LookupYuranSearch extends LookupYuran
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'tahap', 'jenis_pelajar'], 'integer'],
            [['jenis_bayaran'], 'safe'],
            [['jumlah'], 'number'],
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
        $query = LookupYuran::find();

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
            'tahap' => $this->tahap,
            'jumlah' => $this->jumlah,
            'jenis_pelajar' => $this->jenis_pelajar,
        ]);

        $query->andFilterWhere(['like', 'jenis_bayaran', $this->jenis_bayaran]);

        return $dataProvider;
    }
}
