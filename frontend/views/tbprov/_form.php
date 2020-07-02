<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbprov */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbprov-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idprov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'namaprov')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
