<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Instansi;

/* @var $this yii\web\View */
/* @var $model app\models\UserspoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userspo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'id_instansi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
