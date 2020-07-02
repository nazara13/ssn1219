<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbediting".
 *
 * @property int $kodepml
 * @property int $kodepcl
 * @property string $nks
 * @property string $ruta1
 * @property string $ruta2
 * @property string $ruta3
 * @property string $ruta4
 * @property string $ruta5
 * @property string $ruta6
 * @property string $ruta7
 * @property string $ruta8
 * @property string $ruta9
 * @property string $ruta10
 * @property string $Total
 *
 * @property Tbbs $nks0
 * @property Tbpml $kodepml0
 * @property Tbpcl $kodepcl0
 */
class Tbediting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbediting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kodepml', 'kodepcl', 'nks', 'ruta1', 'ruta2', 'ruta3', 'ruta4', 'ruta5', 'ruta6', 'ruta7', 'ruta8', 'ruta9', 'ruta10', 'Total'], 'required'],
            [['kodepml', 'kodepcl'], 'integer'],
            [['ruta1', 'ruta2', 'ruta3', 'ruta4', 'ruta5', 'ruta6', 'ruta7', 'ruta8', 'ruta9', 'ruta10'], 'string'],
            [['nks', 'Total'], 'string', 'max' => 255],
            [['nks'], 'unique'],
            [['nks'], 'exist', 'skipOnError' => true, 'targetClass' => Tbbs::className(), 'targetAttribute' => ['nks' => 'nks']],
            [['kodepml'], 'exist', 'skipOnError' => true, 'targetClass' => Tbpml::className(), 'targetAttribute' => ['kodepml' => 'kodepml']],
            [['kodepcl'], 'exist', 'skipOnError' => true, 'targetClass' => Tbpcl::className(), 'targetAttribute' => ['kodepcl' => 'kodepcl']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kodepml' => 'Kodepml',
            'kodepcl' => 'Kodepcl',
            'nks' => 'Nks',
            'ruta1' => 'Ruta1',
            'ruta2' => 'Ruta2',
            'ruta3' => 'Ruta3',
            'ruta4' => 'Ruta4',
            'ruta5' => 'Ruta5',
            'ruta6' => 'Ruta6',
            'ruta7' => 'Ruta7',
            'ruta8' => 'Ruta8',
            'ruta9' => 'Ruta9',
            'ruta10' => 'Ruta10',
            'Total' => 'Total',
        ];
    }

    /**
     * Gets query for [[Nks0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNks()
    {
        return $this->hasOne(Tbbs::className(), ['nks' => 'nks']);
    }

    /**
     * Gets query for [[Kodepml0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodepml()
    {
        return $this->hasOne(Tbpml::className(), ['kodepml' => 'kodepml']);
    }

    /**
     * Gets query for [[Kodepcl0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKodepcl()
    {
        return $this->hasOne(Tbpcl::className(), ['kodepcl' => 'kodepcl']);
    }
    public function getKodepml0()
    {
        return $this->hasOne(Tbpml::className(), ['kodepml' => 'kodepml']);
    }

    public function getTbpml()
    {
        return $this->hasOne(Tbpml::className(), ['kodepml' => 'kodepml']);
    }
     public function getTbpcl()
    {
        return $this->hasOne(Tbpcl::className(), ['kodepcl' => 'kodepcl']);
    }
}
