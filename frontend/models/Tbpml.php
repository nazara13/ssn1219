<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbpml".
 *
 * @property string $semester
 * @property string $prov
 * @property string $kab
 * @property int $kodepml
 * @property string $namapml
 * @property int $idjabatan
 * @property string $nohp
 * @property int $idedcod
 *
 * @property User $idedcod0
 * @property Tbjabatan $idjabatan0
 */
class Tbpml extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbpml';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['semester', 'prov', 'kab', 'kodepml', 'namapml', 'idjabatan', 'nohp', 'idedcod'], 'required'],
            [['kodepml', 'idjabatan', 'idedcod'], 'integer'],
            [['semester', 'prov', 'kab', 'namapml', 'nohp'], 'string', 'max' => 255],
            [['kodepml'], 'unique'],
            [['idedcod'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['idedcod' => 'id']],
            [['idjabatan'], 'exist', 'skipOnError' => true, 'targetClass' => Tbjabatan::className(), 'targetAttribute' => ['idjabatan' => 'idjabatan']],
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
            'kodepml' => 'Kode PML',
            'namapml' => 'Nama PML',
            'idjabatan' => 'Jabatan',
            'nohp' => 'No HP',
            'idedcod' => 'Pengentri',
        ];
    }

    /**
     * Gets query for [[Idedcod0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdedcod()
    {
        return $this->hasOne(User::className(), ['id' => 'idedcod']);
    }

    /**
     * Gets query for [[Idjabatan0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdjabatan()
    {
        return $this->hasOne(Tbjabatan::className(), ['idjabatan' => 'idjabatan']);
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'idedcod']);
    }

    public function getTbjabatan()
    {
        return $this->hasOne(Tbjabatan::className(), ['idjabatan' => 'idjabatan']);
    }
}
