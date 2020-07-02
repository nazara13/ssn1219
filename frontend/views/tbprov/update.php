<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbprov */

$this->title = 'Update Tbprov: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbprovs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbprov-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
