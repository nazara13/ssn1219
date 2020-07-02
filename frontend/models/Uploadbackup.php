<?php

namespace app\models;
use app\models\User;

use Yii;

/**
 * This is the model class for table "uploadbackup".
 *
 * @property int $idpost
 * @property string $filebackup
 * @property string $keterangan
 * @property string $dateupload
 * @property int $id
 *
 * @property User $id0
 */
class Uploadbackup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploadbackup';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','filebackup', 'keterangan'], 'required'],
            [['dateupload'], 'safe'],
            [['id'], 'integer'],
            [['filebackup'], 'file','extensions'=>'gbzssn2020'],
            [['keterangan'], 'string', 'max' => 255],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idpost' => 'Idpost',
            'filebackup' => 'Filebackup',
            'keterangan' => 'Keterangan',
            'dateupload' => 'Waktu Upload',
            'id' => 'Nama Lengkap',
        ];
    }

    /**
     * Gets query for [[Id0]].
     *
     * @return \yii\db\ActiveQuery
     */
    /*public function getId0()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }*/

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id']);
    }
}
