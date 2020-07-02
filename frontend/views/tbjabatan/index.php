<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbjabatanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbjabatans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbjabatan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbjabatan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idjabatan',
            'jabatan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
