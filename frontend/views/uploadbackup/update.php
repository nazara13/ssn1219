<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadbackup */

$this->title = 'Update Uploadbackup: ' . $model->idpost;
$this->params['breadcrumbs'][] = ['label' => 'Uploadbackups', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpost, 'url' => ['view', 'id' => $model->idpost]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="uploadbackup-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
