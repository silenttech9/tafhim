<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yuran_daftar".
 *
 * @property integer $id
 * @property integer $id_pelajar
 * @property string $tarikh_bayaran
 * @property string $no_resit
 * @property string $jumlah_yuran
 * @property string $jenis_yuran
 * @property string $yuran_tertunggak
 * @property integer $bulan
 * @property integer $tahap_pelajar
 * @property integer $guru_kelas
 * @property string $status_yuran
 * @property integer $tahun
 */
class YuranDaftar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yuran_daftar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajar', 'bulan', 'tahap_pelajar', 'guru_kelas', 'tahun'], 'integer'],
            [['jumlah_yuran', 'yuran_tertunggak'], 'number'],
            [['tarikh_bayaran', 'jenis_yuran'], 'string', 'max' => 50],
            [['no_resit', 'status_yuran'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pelajar' => 'Id Pelajar',
            'tarikh_bayaran' => 'Tarikh Bayaran',
            'no_resit' => 'No Resit',
            'jumlah_yuran' => 'Jumlah Yuran',
            'jenis_yuran' => 'Jenis Yuran',
            'yuran_tertunggak' => 'Yuran Tertunggak',
            'bulan' => 'Bulan',
            'tahap_pelajar' => 'Tahap Pelajar',
            'guru_kelas' => 'Guru Kelas',
            'status_yuran' => 'Status Yuran',
            'tahun' => 'Tahun',
        ];
    }
}
