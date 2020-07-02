<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbpmlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Petugas PML';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbpml-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah PML', ['create'], ['class' => 'btn btn-success']) ?>
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
            'kodepml',
            'namapml',
            //'idjabatan',
            [
                'attribute' => 'idjabatan',
                'value'=>'tbjabatan.jabatan',
            ],
            'nohp',
            //'idedcod',
            [
                'attribute' => 'idedcod',
                'value'=>'user.fullname',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
