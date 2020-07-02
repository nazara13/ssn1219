<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbbs */

$this->title = 'Create Tbbs';
$this->params['breadcrumbs'][] = ['label' => 'Tbbs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbbs-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
