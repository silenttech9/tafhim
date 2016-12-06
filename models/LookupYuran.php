<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_yuran".
 *
 * @property integer $id
 * @property string $jenis_bayaran
 * @property integer $tahap
 * @property double $jumlah
 * @property integer $jenis_pelajar
 */
class LookupYuran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_yuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_bayaran', 'tahap', 'jumlah', 'jenis_pelajar'], 'required'],
            [['tahap', 'jenis_pelajar'], 'integer'],
            [['jumlah'], 'number'],
            [['jenis_bayaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_bayaran' => 'Jenis Bayaran',
            'tahap' => 'Tahap',
            'jumlah' => 'Jumlah',
            'jenis_pelajar' => 'Jenis Pelajar',
        ];
    }
}
