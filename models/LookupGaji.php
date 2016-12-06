<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_gaji".
 *
 * @property integer $id
 * @property string $pendapatan
 */
class LookupGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pendapatan'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pendapatan' => 'Pendapatan',
        ];
    }
}
