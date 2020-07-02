<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbpcl".
 *
 * @property string $semester
 * @property string $prov
 * @property string $kab
 * @property int $kodepcl
 * @property string $namapcl
 * @property int $idjabatan
 * @property string $nohp
 */
class Tbpcl extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbpcl';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester', 'prov', 'kab', 'kodepcl', 'namapcl', 'idjabatan', 'nohp'], 'required'],
            [['kodepcl', 'idjabatan'], 'integer'],
            [['semester', 'prov', 'kab', 'namapcl', 'nohp'], 'string', 'max' => 255],
            [['kodepcl'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'semester' => 'Semester',
            'prov' => 'Prov',
            'kab' => 'Kab',
            'kodepcl' => 'Kode PCL',
            'namapcl' => 'Nama PCL',
            'idjabatan' => 'Jabatan',
            'nohp' => 'No HP',
        ];
    }

    public function getTbjabatan()
    {
        return $this->hasOne(Tbjabatan::className(), ['idjabatan' => 'idjabatan']);
    }
}
