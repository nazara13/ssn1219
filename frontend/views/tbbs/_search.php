<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbbsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbbs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'prov') ?>

    <?= $form->field($model, 'kab') ?>

    <?= $form->field($model, 'kec') ?>

    <?= $form->field($model, 'desa') ?>

    <?= $form->field($model, 'bs') ?>

    <?php // echo $form->field($model, 'nmprov') ?>

    <?php // echo $form->field($model, 'nmkab') ?>

    <?php // echo $form->field($model, 'nmkec') ?>

    <?php // echo $form->field($model, 'nmdesa') ?>

    <?php // echo $form->field($model, 'idbs') ?>

    <?php // echo $form->field($model, 'nks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
