<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbpml */

$this->title = 'Create Tbpml';
$this->params['breadcrumbs'][] = ['label' => 'Tbpmls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbpml-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
