<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Tbediting;
use yii\data\ActiveDataProvider;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbeditingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitoring Editing';
$this->params['breadcrumbs'][] = $this->title;

$js=<<<JS
   $(function(){
    $('#modalButton').click(function(){
        $('#modal').modal('show')
        .find('#modalContent')
        .load($(this).attr('value'));
    });
});
JS;
$this->registerJs($js);

?>
<div class="tbediting-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Tbediting', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <p>
        <?= Html::button('Tambahkan NKS', ['value'=>Url::to('index.php?r=tbediting/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <div class="text-left">
        <?php
            Modal::begin([
                'header'=>'<h4>Tambahkan NKS</h4>',
                'id'=>'modal',
                'size'=>'modal-sm',
            ]);

            echo "<div id='modalContent'></div>";

            Modal::end();
        ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php //setting jumlah  baris gridview
         $dataProvider = new ActiveDataProvider([
                'query' => Tbediting::find(),
                'pagination' => [
                    'pageSize' => 66,
                ],
            ]);
    ?>

    <div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions'=> function($model){
            if ($model->ruta1 == 'Belum dicacah' OR $model->ruta1 == 'Dokumen di PCL' OR $model->ruta1 == 'Dokumen di PML') {
               return ['class'=>'warning'];
            }elseif ($model->ruta2 == 'Belum dicacah' OR $model->ruta2 == 'Dokumen di PCL' OR $model->ruta2 == 'Dokumen di PML') {
               return ['class'=>'warning'];
            }elseif ($model->ruta3 == 'Belum dicacah' OR $model->ruta3 == 'Dokumen di PCL' OR $model->ruta3 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }elseif ($model->ruta4 == 'Belum dicacah' OR $model->ruta4 == 'Dokumen di PCL' OR $model->ruta4 == 'Dokumen di PML') {
               return ['class'=>'warning'];
            }elseif ($model->ruta5 == 'Belum dicacah' OR $model->ruta5 == 'Dokumen di PCL' OR $model->ruta5 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }elseif ($model->ruta6 == 'Belum dicacah' OR $model->ruta6 == 'Dokumen di PCL' OR $model->ruta6 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }elseif ($model->ruta7 == 'Belum dicacah' OR $model->ruta7 == 'Dokumen di PCL' OR $model->ruta7 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }elseif ($model->ruta8 == 'Belum dicacah' OR $model->ruta8 == 'Dokumen di PCL' OR $model->ruta8 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }elseif ($model->ruta9 == 'Belum dicacah' OR $model->ruta9 == 'Dokumen di PCL' OR $model->ruta9 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }elseif ($model->ruta10 == 'Belum dicacah' OR $model->ruta10 == 'Dokumen di PCL' OR $model->ruta10 == 'Dokumen di PML') {
                return ['class'=>'warning'];
            }else {
                return ['class'=>'success'];
            }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*[
                'attribute' => 'id',
                'label' => 'Petugas Entri',
                'value'=>'tbpml.user.fullname',
            ],*/
            //'kodepml',
            [
                'attribute' => 'kodepml',
                'label' => 'Petugas Pengawas',
                'value'=>'tbpml.namapml',
            ],
            //'kodepcl',
            [
                'attribute' => 'kodepcl',
                'label' => 'Petugas Pencacah',
                'value'=>'tbpcl.namapcl',
            ],
            //'nks',
            [
                'attribute' => 'nks',
                'label' => 'NKS',
                'format' => 'raw',
                'value' => function($data){
                    return Html::a($data->nks,'#',['onclick'=>'detail(this,'.$data->nks.'); return false;']);
                }
            ],
            //'ruta1',
            [
            'attribute' => 'ruta1',
                'label' => 'Ruta 1',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta1 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta1 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta1 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta2',
            [
            'attribute' => 'ruta2',
                'label' => 'Ruta 2',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta2 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta2 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta2 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta3',
            [
            'attribute' => 'ruta3',
                'label' => 'Ruta 3',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta3 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta3 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta3 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta4',
            [
            'attribute' => 'ruta4',
                'label' => 'Ruta 4',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta4 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta4 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta4 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta5',
            [
            'attribute' => 'ruta5',
                'label' => 'Ruta 5',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta5 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta5 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta5 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta6',
            [
            'attribute' => 'ruta6',
                'label' => 'Ruta 6',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta6 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta6 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta6 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta7',
            [
            'attribute' => 'ruta7',
                'label' => 'Ruta 7',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta7 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta7 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta7 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta8',
            [
            'attribute' => 'ruta8',
                'label' => 'Ruta 8',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta8 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta8 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta8 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta9',
            [
            'attribute' => 'ruta9',
                'label' => 'Ruta 9',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta9 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta9 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta9 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'ruta10',
            [
            'attribute' => 'ruta10',
                'label' => 'Ruta 10',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta10 == 'Belum dicacah') {
                        return '<span class="label label-danger">Belum Dicacah</span>';
                    } elseif ($model->ruta10 == 'Dokumen di PCL'){
                        return '<span class="label label-warning">Dokumen di PCL</span>';
                    }elseif ($model->ruta10 == 'Dokumen di PML'){
                        return '<span class="label label-primary">Dokumen di PML</span>';
                    }else{
                        return '<span class="label label-success">Editing</span>';
                    }
                }
            ],
            //'Total',
            [
            'attribute' => 'Total',
                'label' => 'Status Dokumen di Editor',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta1 == 'Belum dicacah' OR $model->ruta1 == 'Dokumen di PCL' OR $model->ruta1 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta2 == 'Belum dicacah' OR $model->ruta2 == 'Dokumen di PCL' OR $model->ruta2 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta3 == 'Belum dicacah' OR $model->ruta3 == 'Dokumen di PCL' OR $model->ruta3 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta4 == 'Belum dicacah' OR $model->ruta4 == 'Dokumen di PCL' OR $model->ruta4 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta5 == 'Belum dicacah' OR $model->ruta5 == 'Dokumen di PCL' OR $model->ruta5 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta6 == 'Belum dicacah' OR $model->ruta6 == 'Dokumen di PCL' OR $model->ruta6 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta7 == 'Belum dicacah' OR $model->ruta7 == 'Dokumen di PCL' OR $model->ruta7 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta8 == 'Belum dicacah' OR $model->ruta8 == 'Dokumen di PCL' OR $model->ruta8 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta9 == 'Belum dicacah' OR $model->ruta9 == 'Dokumen di PCL' OR $model->ruta9 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta10 == 'Belum dicacah' OR $model->ruta10 == 'Dokumen di PCL' OR $model->ruta10 == 'Dokumen di PML') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }else {
                        return '<span class="label label-success">Selesai Diedit</span>';
                    }
                }
            ],

            ['class' => 'yii\grid\ActionColumn', 'header'=>'Action'],
        ],
    ]); ?>

     <?php 
                $this->registerJs('
                        function detail(obj,nks){
                            
                            var a = obj;
                            var td = $(a).parent();
                            var tr = $(td).parent();
                            var tdCount = $(tr).children().length;
                            var table = $(tr).parent();
                            $(table).children(".trDetail").remove();
                             
                            var trDetail = document.createElement("tr");
                            $(trDetail).attr("class","trDetail");
                            var tdDetail = document.createElement("td");
                            $(tdDetail).attr("colspan",tdCount);
                            $(tdDetail).html("<span class=\'fa fa-spinner fa-spin\'></span>");
                            $.get("'.\yii\helpers\Url::to(['tbbs/view']).'&id="+nks, function( data ) {
                              $(tdDetail).html( data );
                            }).fail(function() {
                                alert( "error" );
                              });
                            $(trDetail).append(tdDetail);
                            $(tr).after(trDetail);
                        }
                     
                ', \yii\web\View::POS_END) ?>   
</div>
</div>
</div>
