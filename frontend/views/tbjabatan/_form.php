<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbjabatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbjabatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jabatan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
