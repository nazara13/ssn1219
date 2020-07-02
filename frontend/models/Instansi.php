<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instansi".
 *
 * @property int $id_instansi
 * @property string $nama_instansi
 *
 * @property Userspo[] $userspos
 */
class Instansi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'instansi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_instansi'], 'required'],
            [['nama_instansi'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_instansi' => 'Id Instansi',
            'nama_instansi' => 'Nama Instansi',
        ];
    }

    /**
     * Gets query for [[Userspos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserspos()
    {
        return $this->hasMany(Userspo::className(), ['id_instansi' => 'id_instansi']);
    }
}
