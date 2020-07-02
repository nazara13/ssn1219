<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbpcl */

$this->title = 'Update Tbpcl: ' . $model->kodepcl;
$this->params['breadcrumbs'][] = ['label' => 'Tbpcls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kodepcl, 'url' => ['view', 'id' => $model->kodepcl]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbpcl-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
