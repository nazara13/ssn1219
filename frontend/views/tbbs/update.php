<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbbs */

$this->title = 'Update Tbbs: ' . $model->nks;
$this->params['breadcrumbs'][] = ['label' => 'Tbbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nks, 'url' => ['view', 'id' => $model->nks]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbbs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
