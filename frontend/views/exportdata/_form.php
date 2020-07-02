<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Exportdata */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="exportdata-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fileexport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateupload')->textInput() ?>

    <!-- <?= $form->field($model, 'id')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
