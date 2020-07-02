<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Userspo */

$this->title = 'Upload Bukti Pengisian';
//$this->params['breadcrumbs'][] = ['label' => 'Userspos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userspo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
