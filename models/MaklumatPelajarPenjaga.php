<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maklumat_pelajar_penjaga".
 *
 * @property integer $id
 * @property string $nama_pelajar
 * @property string $jantina
 * @property string $tarikh_lahir
 * @property string $tempat_lahir
 * @property string $no_surat_beranak
 * @property string $no_mykid
 * @property integer $pusat_pengajian_id
 * @property string $sesi_pengajian
 * @property string $tarikh_masuk
 * @property string $tahun_mula
 * @property string $alamat_rumah
 * @property string $SPRA
 * @property string $PSRA
 * @property string $status
 * @property string $warganegara
 * @property string $tahun_lewat
 * @property string $alumni
 * @property string $nama_bapa
 * @property string $no_kad_pengenalan_bapa
 * @property string $pekerjaan_bapa_penjaga
 * @property string $no_tel_bapa
 * @property string $no_hp_bapa
 * @property string $alamat_majikan_bapa_penjaga
 * @property integer $gaji_bapa
 * @property string $nama_ibu
 * @property string $no_kad_pengenalan_ibu
 * @property string $pekerjaan_ibu
 * @property string $no_tel_ibu
 * @property string $no_hp_ibu
 * @property string $alamat_majikan_ibu
 * @property integer $gaji_ibu
 * @property string $date_create
 * @property string $date_update
 * @property integer $enter_by
 * @property integer $update_by
 */
class MaklumatPelajarPenjaga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_pelajar_penjaga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jantina', 'tempat_lahir', 'sesi_pengajian', 'alamat_rumah', 'status', 'alamat_majikan_bapa_penjaga', 'alamat_majikan_ibu'], 'string'],
            [['pusat_pengajian_id', 'gaji_bapa', 'gaji_ibu', 'enter_by', 'update_by','kelas'], 'integer'],
            [['date_create', 'date_update'], 'safe'],
            ['no_mykid', 'unique','message'=>'No My Kid Sudah Wujud'],
            [['no_mykid'], 'required','message'=>'Sila Isikan No My Kid Pelajar'],
            [['nama_pelajar', 'tarikh_masuk', 'tahun_mula', 'SPRA', 'PSRA', 'warganegara', 'tahun_lewat', 'alumni', 'nama_bapa', 'no_kad_pengenalan_bapa', 'pekerjaan_bapa_penjaga', 'no_tel_bapa', 'no_hp_bapa', 'nama_ibu', 'no_kad_pengenalan_ibu', 'pekerjaan_ibu', 'no_tel_ibu', 'no_hp_ibu'], 'string', 'max' => 255],
            [['tarikh_lahir', 'no_surat_beranak', 'no_mykid'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pelajar' => 'Nama Pelajar',
            'jantina' => 'Jantina',
            'tarikh_lahir' => 'Tarikh Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'no_surat_beranak' => 'No Surat Beranak',
            'no_mykid' => 'No Mykid',
            'pusat_pengajian_id' => 'Pusat Pengajian',
            'sesi_pengajian' => 'Sesi Pengajian',
            'tarikh_masuk' => 'Tarikh Masuk',
            'tahun_mula' => 'Tahun Mula',
            'alamat_rumah' => 'Alamat Rumah',
            'SPRA' => 'SPRA',
            'PSRA' => 'PSRA',
            'status' => 'Status',
            'warganegara' => 'Warganegara',
            'tahun_lewat' => 'Tahun Lewat',
            'alumni' => 'Alumni',
            'nama_bapa' => 'Nama Bapa',
            'no_kad_pengenalan_bapa' => 'No Kad Pengenalan Bapa',
            'pekerjaan_bapa_penjaga' => 'Pekerjaan Bapa Penjaga',
            'no_tel_bapa' => 'No Tel Bapa',
            'no_hp_bapa' => 'No Handphone Bapa',
            'alamat_majikan_bapa_penjaga' => 'Alamat Majikan Bapa Penjaga',
            'gaji_bapa' => 'Gaji Bapa',
            'nama_ibu' => 'Nama Ibu',
            'no_kad_pengenalan_ibu' => 'No Kad Pengenalan Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'no_tel_ibu' => 'No Tel Ibu',
            'no_hp_ibu' => 'No Handphone Ibu',
            'alamat_majikan_ibu' => 'Alamat Majikan Ibu',
            'gaji_ibu' => 'Gaji Ibu',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'enter_by' => 'Enter By',
            'update_by' => 'Update By',
            'kelas' => 'Kelas',
        ];
    }

    public function getPendapatanbapa()
    {
        return $this->hasOne(LookupPendapatan::className(), ['id' => 'gaji_bapa']);
    }
    public function getPendapatanibu()
    {
        return $this->hasOne(LookupPendapatan::className(), ['id' => 'gaji_ibu']);
    }
}
