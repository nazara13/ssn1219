<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbbsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="tbbs-index">
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
