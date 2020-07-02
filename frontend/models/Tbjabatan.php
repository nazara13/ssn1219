<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbjabatan".
 *
 * @property int $idjabatan
 * @property string $jabatan
 */
class Tbjabatan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbjabatan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jabatan'], 'required'],
            [['jabatan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idjabatan' => 'Idjabatan',
            'jabatan' => 'Jabatan',
        ];
    }
}
