<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbprov */

$this->title = 'Create Tbprov';
$this->params['breadcrumbs'][] = ['label' => 'Tbprovs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbprov-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
