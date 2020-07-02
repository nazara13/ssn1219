<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


$this->title = 'Import Rumah Tangga';
$this->params['breadcrumbs'][] = ['label' => 'Tbmonitorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<!-- <h1><?= Html::encode($this->title) ?></h1> -->

<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model,'file')->fileInput() ?>
   
    <div class="form-group">
        <?= Html::submitButton('Save',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>