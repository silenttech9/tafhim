<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_kelas".
 *
 * @property integer $id
 * @property string $kelas
 * @property integer $id_pusat_pengajian
 */
class LookupKelas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kelas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pusat_pengajian'], 'integer'],
            [['kelas'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kelas' => 'Kelas',
            'id_pusat_pengajian' => 'Id Pusat Pengajian',
        ];
    }

    public function getPusatpengajian()
    {
        return $this->hasOne(LookupPusatPengajian::className(), ['id' => 'id_pusat_pengajian']);
    }



}
