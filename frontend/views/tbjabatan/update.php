<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbjabatan */

$this->title = 'Update Tbjabatan: ' . $model->idjabatan;
$this->params['breadcrumbs'][] = ['label' => 'Tbjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idjabatan, 'url' => ['view', 'id' => $model->idjabatan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbjabatan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
