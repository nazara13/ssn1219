<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbprov".
 *
 * @property int $id
 * @property string $idprov
 * @property string $namaprov
 */
class Tbprov extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbprov';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idprov', 'namaprov'], 'required'],
            [['idprov', 'namaprov'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idprov' => 'Idprov',
            'namaprov' => 'Namaprov',
        ];
    }
}
