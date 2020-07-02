<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbpmlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbpml-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'semester') ?>

    <?= $form->field($model, 'prov') ?>

    <?= $form->field($model, 'kab') ?>

    <?= $form->field($model, 'kodepml') ?>

    <?= $form->field($model, 'namapml') ?>

    <?php // echo $form->field($model, 'idjabatan') ?>

    <?php // echo $form->field($model, 'nohp') ?>

    <?php // echo $form->field($model, 'idedcod') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
