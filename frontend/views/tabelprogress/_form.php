<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Instansi;

/* @var $this yii\web\View */
/* @var $model app\models\Userspo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userspo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>



    <?= $form->field($model, 'id_instansi')->dropDownList(
    	ArrayHelper::map(Instansi::find()->all(),'id_instansi','nama_instansi'),
    	['prompt'=>'Pilih Instansi']
    ) ?>



    <?= $form->field($model, 'logo')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
