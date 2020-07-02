<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Import NKS/BS';
$this->params['breadcrumbs'][] = ['label' => 'Tbbss', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model,'file')->fileInput() ?>
   
    <div class="form-group">
        <?= Html::submitButton('Save',['class'=>'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>