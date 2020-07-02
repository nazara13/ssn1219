<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbbs */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbbs-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmprov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmkab')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmkec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nmdesa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idbs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
