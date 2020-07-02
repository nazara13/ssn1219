<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\User;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadolah */
/* @var $form yii\widgets\ActiveForm */

$this->title = "Upload File Backup";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="uploadolah-form">
	<h1><?php echo Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(User::find()->all(),'id','fullname'),
        'language' => 'en',
        'options' => ['placeholder' => 'Pilih Petugas ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>

    <?= $form->field($model, 'filebackup')->fileInput() ?>

   <!--  <?= $form->field($model, 'filebackup')->fileInput(); ?> -->

    <!-- <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?> -->

    <!-- <?= $form->field($model, 'dateupload')->textInput() ?> -->

    <!-- <?= $form->field($model, 'id')->textInput() ?>  -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
