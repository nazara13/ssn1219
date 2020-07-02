<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbpml */

$this->title = 'Update Tbpml: ' . $model->kodepml;
$this->params['breadcrumbs'][] = ['label' => 'Tbpmls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kodepml, 'url' => ['view', 'id' => $model->kodepml]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbpml-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
