<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadolah */

$this->title = 'Create Uploadolah';
$this->params['breadcrumbs'][] = ['label' => 'Uploadolahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uploadolah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
