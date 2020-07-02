<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TbmonitoringSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbmonitoring-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'kodepml') ?>

    <?= $form->field($model, 'kodepcl') ?>

    <?= $form->field($model, 'nks') ?>

    <?= $form->field($model, 'ruta1') ?>

    <?= $form->field($model, 'ruta2') ?>

    <?php // echo $form->field($model, 'ruta3') ?>

    <?php // echo $form->field($model, 'ruta4') ?>

    <?php // echo $form->field($model, 'ruta5') ?>

    <?php // echo $form->field($model, 'ruta6') ?>

    <?php // echo $form->field($model, 'ruta7') ?>

    <?php // echo $form->field($model, 'ruta8') ?>

    <?php // echo $form->field($model, 'ruta9') ?>

    <?php // echo $form->field($model, 'ruta10') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
