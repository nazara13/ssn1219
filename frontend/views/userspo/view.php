<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Userspo */

$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Userspos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Upload', 'url' => ['create']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="userspo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Perbaiki', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id' => $model->id], [
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
            'id',
            'nama',
           /* 'id_instansi',*/
            'instansi.nama_instansi',
            //'logo',
            [
                'attribute'=>'logo',
                'format' => 'html',
                'value'=>('<img src =' .'uploads/' . $model->logo . ' height="175" width="100"' .   '>')
            ],
        ],
    ]) ?>

</div>
