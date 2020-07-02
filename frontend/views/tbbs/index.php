<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbbsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar NKS/BS';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbbs-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah NKS/BS', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'prov',
            'kab',
            'kec',
            'desa',
            'bs',
            'nmprov',
            'nmkab',
            'nmkec',
            'nmdesa',
            'idbs',
            'nks',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
