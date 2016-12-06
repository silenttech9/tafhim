<?php

namespace app\models;

use Yii;
use app\models\MaklumatKakitangan;
use app\models\LookupCuti;
/**
 * This is the model class for table "maklumat_cuti".
 *
 * @property integer $id
 * @property integer $id_staff
 * @property integer $jenis_cuti
 * @property integer $tahun
 * @property integer $bulan
 * @property string $bilangan_cuti
 */
class MaklumatCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id_staff', 'required', 'message' => 'Nama Kakitangan Wajib Di isi'],
            ['tarikh_akhir', 'required', 'message' => 'Tarikh Akhir Wajib Di isi'],
            ['tarikh_mula', 'required', 'message' => 'Tarikh Mula Wajib Di isi'],
            ['bilangan_cuti', 'required', 'message' => 'Bilangan Cuti Wajib Di isi'],
            ['jenis_cuti', 'required', 'message' => 'Jenis Cuti Wajib Di isi'],

            [['id_staff', 'jenis_cuti', 'tahun', 'bulan'], 'integer'],
            [['bilangan_cuti'], 'string', 'max' => 100],
            [['tarikh_mula','tarikh_akhir'],'string','max'=> 50],
            [['sebab_cuti'],'string','max'=>300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'id' => 'ID',
            'id_staff' => 'Nama Kakitangan',
            'jenis_cuti' => 'Jenis Cuti',
            'tahun' => 'Tahun',
            'bulan' => 'Bulan',
            'bilangan_cuti' => 'Bilangan Cuti',
            'tarikh_akhir' => 'Tarikh Akhir Cuti',
            'tarikh_mula' => 'Tarikh Mula Cuti',
            'sebab_cuti' => 'Sebab Bercuti',
        ];
    }

    public function getNama_kakitangan()
    {
        return $this->hasOne(MaklumatKakitangan::className(),['id_staf' =>'id_staff']);
    }

    public function getCuti()
    {
        return $this->hasOne(LookupCuti::className(),['id'=>'jenis_cuti']);
    }
}
