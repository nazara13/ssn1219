<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbpml */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbpml-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semester')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kodepml')->textInput() ?>

    <?= $form->field($model, 'namapml')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idjabatan')->textInput() ?>

    <?= $form->field($model, 'nohp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idedcod')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
