<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Tbmonitoring */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbmonitoring-form">

    <?php $form = ActiveForm::begin(); ?>
   

   <!--  <?= $form->field($model, 'kodepml')->textInput() ?>

    <?= $form->field($model, 'kodepcl')->textInput() ?>

    <?= $form->field($model, 'nks')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'ruta1')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta2')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta3')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta4')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta5')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta6')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta7')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta8')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta9')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta10')->dropDownList([ 'Selesai' => 'Selesai', 'Belum' => 'Belum', ], ['prompt' => '']) ?>

 <!--    <?php $form->field($model, 'Total')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
