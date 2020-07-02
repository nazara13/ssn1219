<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Instansi;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\Userspo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="userspo-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_instansi')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Instansi::find()->all(),'id_instansi','nama_instansi'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Instansi ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>


    <?= $form->field($model, 'logo')->fileInput(); ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

