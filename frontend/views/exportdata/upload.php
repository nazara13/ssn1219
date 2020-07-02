<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadolah */
/* @var $form yii\widgets\ActiveForm */

$this->title = "Upload Export Data";
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="uploadolah-form">
	<h1><?php echo Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'fileexport')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
