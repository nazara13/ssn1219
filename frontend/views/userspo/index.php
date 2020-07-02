<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Instansi;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserspoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Peserta';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="userspo-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Tambah Peserta', ['value'=>Url::to('index.php?r=userspo/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
        Modal::begin([
            'header'=>'<h4>Peserta SPO</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
        ]);

        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
    <div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'class'=> 'yii\grid\ActionColumn',
                'header'=>'Action',
                'headerOptions'=>['width'=>'80'],
                'template'=>'{view} {update} {delete} {link}',
                'buttons'=> [
                    'update' => function($url,$model){
                        return Html::a(
                            '<span class="glyphicon glyphicon-user"></span>',
                            $url);
                },
                    'delete' => function($url,$model){
                        return Html::a(
                            '<span class="glyphicon glyphicon-remove"></span>',
                            $url);
                },

                'link'=>function($url,$model,$key){
                    return Html::a('Action', $url);
                },
             ],

            ],

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

       /*     [
                'label'=>'Logo',
                'attribute'=>'logo',
                'format'=>'html',
                'value'=>function($model){
                    return yii\bootstrap\Html::img($model->logo,['width'=>'150']);
                }
            ],*/

           /* [

            'attribute' => 'logo',

            'format' => 'html',

            'label' => 'Logo',

            'value' => function ($model) {

                return Html::img('C:\xampp\htdocs\advanced\frontend\web\uploads\\' . $model['logo'],

                    ['width' => '60px']);

            },
        ],*/
            
            ['class' => 'yii\grid\ActionColumn', 'header'=>'Action',],

/*            [
                'class'    => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'template' => '{view}',
                'buttons'  => [
                    'leadView'   => function ($url, $model) {
                        $url = Url::to(['userspocontroller/view', 'id' => $model->id]);
                        return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                    },*/
                    /*'leadUpdate' => function ($url, $model) {
                        $url = Url::to(['controller/lead-update', 'id' => $model->whatever_id]);
                        return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                    },*/
                    /*'leadDelete' => function ($url, $model) {
                        $url = Url::to(['controller/lead-delete', 'id' => $model->whatever_id]);
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title'        => 'delete',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                            ]);
                    },*/
       /*         ]
            ],*/

           ],  
    ]); ?>
</div>
</div>
