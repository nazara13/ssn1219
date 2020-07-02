<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbjabatan */

$this->title = 'Create Tbjabatan';
$this->params['breadcrumbs'][] = ['label' => 'Tbjabatans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbjabatan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
