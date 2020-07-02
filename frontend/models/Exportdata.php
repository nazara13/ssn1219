<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "exportdata".
 *
 * @property int $idpost
 * @property string $fileexport
 * @property string $keterangan
 * @property string $dateupload
 * @property int $id
 */
class Exportdata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exportdata';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fileexport', 'keterangan'], 'required'],
            [['dateupload'], 'safe'],
            [['id'], 'integer'],
            [['fileexport'], 'file','extensions'=>'rar,zip,xls,xlsx,dbf'],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'idpost' => 'Idpost',
            'fileexport' => 'Fileexport',
            'keterangan' => 'Keterangan',
            'dateupload' => 'Waktu Upload',
            //'id' => 'ID',
        ];
    }
}
