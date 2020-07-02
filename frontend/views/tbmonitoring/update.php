<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbmonitoring */

$this->title = 'Update Kondisi NKS (Entri): ' . $model->nks;
$this->params['breadcrumbs'][] = ['label' => 'Tbmonitorings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nks, 'url' => ['view', 'id' => $model->nks]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbmonitoring-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
