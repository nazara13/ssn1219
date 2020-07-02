<?php

namespace app\models;
use app\models\User;

use Yii;

/**
 * This is the model class for table "uploadolah".
 *
 * @property int $idpost
 * @property string $filesplit
 * @property string $keterangan
 * @property string $dateupload
 * @property int $id
 *
 * @property User $id0
 */
class Uploadolah extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploadolah';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','filesplit', 'keterangan'], 'required'],
            [['dateupload'], 'safe'],
            [['id'], 'integer'],
            [['filesplit'], 'file','extensions'=>'gbzssn2020'],
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
            'filesplit' => 'Filesplit',
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
