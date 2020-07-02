<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbpcl */

$this->title = 'Create Tbpcl';
$this->params['breadcrumbs'][] = ['label' => 'Tbpcls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbpcl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
