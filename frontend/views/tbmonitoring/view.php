<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tbmonitoring */

$this->title = $model->nks;
$this->params['breadcrumbs'][] = ['label' => 'Tabel Monitoring', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbmonitoring-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->nks], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->nks], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>

        <!-- Menu Kembali -->
        <?php 
        //echo \yii\helpers\Html::a( 'Kembali', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); //kembali ke halaman aksi paling terakhir
        echo \yii\helpers\Html::a('Kembali',['/tbmonitoring/hitung'], ['data-method' => 'post', 'class' => 'btn btn-success']) //kembali render ke link yg ditentukan
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            /*'kodepml',
            'kodepcl',*/
            'nks',
            'ruta1',
            'ruta2',
            'ruta3',
            'ruta4',
            'ruta5',
            'ruta6',
            'ruta7',
            'ruta8',
            'ruta9',
            'ruta10',
            /*'Total',*/
        ],
    ]) ?>

</div>
