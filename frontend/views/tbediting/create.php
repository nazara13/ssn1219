<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tbediting */

$this->title = 'Tambahkan NKS';
$this->params['breadcrumbs'][] = ['label' => 'Tbeditings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbediting-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
