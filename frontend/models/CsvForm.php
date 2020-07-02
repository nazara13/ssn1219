<?php

namespace app\models;
use yii\base\Model;

use Yii;

/**
 * This is the model class for table "tbprov".
 *
 * @property int $id
 * @property string $idprov
 * @property string $namaprov
 */
class CsvForm extends Model{
    public $file;
    //public $filetbidbs;
   
    public function rules(){
        return [
            [['file'],'required'],
            [['file'],'file','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
            //[['filetbidbs'],'filetbidbs','extensions'=>'csv','maxSize'=>1024 * 1024 * 5],
        ];
    }
   
    public function attributeLabels(){
        return [
            'file'=>'Select File',
            //'filetbidbs'=>'Select File',
        ];
    }
}
