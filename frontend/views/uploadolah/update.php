<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadolah */

$this->title = 'Update Uploadolah: ' . $model->idpost;
$this->params['breadcrumbs'][] = ['label' => 'Uploadolahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpost, 'url' => ['view', 'id' => $model->idpost]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uploadolah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
