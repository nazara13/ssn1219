<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbpclSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Petugas PCL';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbpcl-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah PCL', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'semester',
            'prov',
            'kab',
            'kodepcl',
            'namapcl',
            //'idjabatan',
            [
                'attribute' => 'idjabatan',
                'value'=>'tbjabatan.jabatan',
            ],
            'nohp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    </div>
</div>
