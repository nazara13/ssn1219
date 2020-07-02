<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\TbprovSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbprovs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbprov-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbprov', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'idprov',
            'namaprov',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
