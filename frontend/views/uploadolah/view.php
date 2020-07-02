<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Uploadolah */

$this->title = $model->idpost;
$this->params['breadcrumbs'][] = ['label' => 'Uploadolahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="uploadolah-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idpost], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idpost], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpost',
            'filesplit',
            [
                'attribute'=>'filesplit',
                'format' => 'html',
                'value'=>('<img src =' .'uploadfile/' . $model->filesplit . ' height="175" width="100"' .   '>')
            ],
            'keterangan',
            'dateupload',
            'id',
        ],
    ]) ?>

</div>
