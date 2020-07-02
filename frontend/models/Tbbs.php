<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbbs".
 *
 * @property string $prov
 * @property string $kab
 * @property string $kec
 * @property string $desa
 * @property string $bs
 * @property string $nmprov
 * @property string $nmkab
 * @property string $nmkec
 * @property string $nmdesa
 * @property string $idbs
 * @property string $nks
 */
class Tbbs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbbs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['prov', 'kab', 'kec', 'desa', 'bs', 'nmprov', 'nmkab', 'nmkec', 'nmdesa', 'idbs', 'nks'], 'required'],
            [['prov', 'kab', 'kec', 'desa', 'bs', 'nmprov', 'nmkab', 'nmkec', 'nmdesa', 'idbs', 'nks'], 'string', 'max' => 255],
            [['nks'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'prov' => 'Prov',
            'kab' => 'Kab',
            'kec' => 'Kec',
            'desa' => 'Desa',
            'bs' => 'Blok Sensus',
            'nmprov' => 'Provinsi',
            'nmkab' => 'Kabupaten',
            'nmkec' => 'Kecamatan',
            'nmdesa' => 'Desa',
            'idbs' => 'ID Blok Sensus',
            'nks' => 'NKS',
        ];
    }
}
