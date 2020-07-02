<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "userspo".
 *
 * @property int $id
 * @property string $nama
 * @property int $id_instansi
 * @property resource $bukti_spo
 *
 * @property Instansi $instansi
 */
class Tabelprogress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'userspo','instansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'id_instansi', 'logo'], 'required'],
            [['id_instansi'], 'integer'],
            [['logo'],'file','extensions'=>'jpg,jpeg,png'],
            [['nama'], 'string', 'max' => 250],
            [['id_instansi'], 'exist', 'skipOnError' => true, 'targetClass' => Instansi::className(), 'targetAttribute' => ['id_instansi' => 'id_instansi']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'id_instansi' => 'Nama Instansi',
            'logo' => 'Bukti SPO',
        ];
    }

    /**
     * Gets query for [[Instansi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstansi()
    {
        return $this->hasOne(Instansi::className(), ['id_instansi' => 'id_instansi']);
    }
}
