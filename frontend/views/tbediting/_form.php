<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbediting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbediting-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'kodepml')->textInput() ?>

    <?= $form->field($model, 'kodepcl')->textInput() ?>

    <?= $form->field($model, 'nks')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'ruta1')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta2')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta3')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta4')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta5')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta6')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta7')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta8')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta9')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'ruta10')->dropDownList([ 'Belum dicacah' => 'Belum dicacah', 'Dokumen di PCL' => 'Dokumen di PCL', 'Dokumen di PML' => 'Dokumen di PML', 'Editing' => 'Editing', ], ['prompt' => '']) ?>

   <!--  <?= $form->field($model, 'Total')->textInput(['maxlength' => true]) ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
