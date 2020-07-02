<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Instansi */

$this->title = 'Update Instansi: ' . $model->id_instansi;
$this->params['breadcrumbs'][] = ['label' => 'Instansis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_instansi, 'url' => ['view', 'id' => $model->id_instansi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="instansi-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
