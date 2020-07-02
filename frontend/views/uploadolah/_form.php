<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadolah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="uploadolah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'filesplit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'dateupload')->textInput() ?> -->

    <?= $form->field($model, 'id')->textInput() ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
