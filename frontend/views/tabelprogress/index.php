<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Userspo;
use app\models\Instansi;
use yii\helpers\ArrayHelper;
use yii\widgets\LinkPager;
use yii\widgets\ListView;
use yii\helpers\Url;
use yii\data\Pagination;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserspoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userspo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Peserta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'nama',
            /*'id_instansi',
            array(
                'label'=>'Nama Instansi',
                'value'=>'instansi.nama_instansi',
            ),*/
            

            [
                'attribute' => 'Nama Instansi',
                'value' => 'instansi.nama_instansi',
                'filter' => Html::activeDropDownList($searchModel, 'id_instansi', ArrayHelper::map(Instansi::find()->asArray()->all(), 'id_instansi','nama_instansi'),['class'=>'form-control','prompt' => 'Pilih Instansi']),
            ],
            'logo',
            //'skpd',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <div>
        <?php
             echo LinkPager::widget([
                'pagination' => $pages,
            ]);
        ?>
    </div>

</div>
