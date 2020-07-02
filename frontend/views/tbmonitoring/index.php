<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;
use app\models\Tbmonitoring;
use yii\helpers\ArrayHelper;
use app\models\Tbpml;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\data\SqlDataProvider;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbmonitoringSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Monitoring Dokumen Entri';
$this->params['breadcrumbs'][] = $this->title;
//$datalist = ['' => 'Pilih'] + ArrayHelper::map(Tbpml::find()->all(), 'kodepml','namapml');
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
<div class="tbmonitoring-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Tbmonitoring', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <p>
        <?= Html::button('Tambahkan NKS', ['value'=>Url::to('index.php?r=tbmonitoring/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
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

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php //setting jumlah  baris gridview
         $dataProvider = new ActiveDataProvider([
                'query' => Tbmonitoring::find(),
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
            if ($model->ruta1 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta2 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta3 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta4 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta5 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta6 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta7 == 'Belum') {
                        return ['class'=>'danger'];
                    }elseif ($model->ruta8 == 'Belum') {
                       return ['class'=>'danger'];
                    }elseif ($model->ruta9 == 'Belum') {
                       return ['class'=>'danger'];
                    }elseif ($model->ruta10 == 'Belum') {
                        return ['class'=>'danger'];
                    }else {
                        return ['class'=>'success'];
                    }
        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            /*[
                'headerOptions' => ['class' => 'text-center'],
                'attribute' => 'tbpml.namapml',
                'filter' => Html::activeDropDownList($searchModel, 'kodepml', $datalist, ['class' => 'form-control']),

            ],*/
            [
                'attribute' => 'id',
                'label' => 'Petugas Entri',
                'value'=>'tbpml.user.fullname',
            ],
            //'kodepml',

            [
                'attribute' => 'kodepml',
                'label' => 'Petugas Pengawas',
                'value'=>'tbpml.namapml',
            ],
            /*[
                'attribute' => 'kodepml',
                'label' => 'Petugas Pengawas',
                'value'=>'tbpml.namapml',
                'filter' => Html::activeDropDownList($searchModel, 'kodepml', $datalist, ['class' => 'form-control']),
            ],*/
            /*[
                'filter'=>Select2::widget([
                    'model'=>$searchModel,
                    'attribute'=>'kodepml',
                    'value'=>'kodepml',
                    //'data' => Object::typeNames(),
                    'theme' => Select2::THEME_BOOTSTRAP,

                    'hideSearch' => true,

                    'options' => [

                        'placeholder' => 'Pilih PML...',

                    ]

                ]),
            ],*/

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
                    if ($model->ruta1 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta2 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta3 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta4 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta5 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta6 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta7 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta8 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta9 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
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
                    if ($model->ruta10 == 'Selesai') {
                        return '<span class="label label-success">Entri</span>';
                    } else {
                        return '<span class="label label-danger">Belum</span>';
                    }
                }
            ],
            //'Total',
            //'totalnks',

            /*[
                'attribute' => 'totalnks',
                'label' => 'Total NKS',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => 'totalnks',
            ],*/
            [
                'attribute' => 'Total',
                'label' => 'Status Dokumen di Pengentri',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => function($model) {
                    if ($model->ruta1 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta2 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta3 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta4 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta5 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta6 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta7 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta8 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta9 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }elseif ($model->ruta10 == 'Belum') {
                        return '<span class="label label-danger">Belum Lengkap</span>';
                    }else {
                        return '<span class="label label-success">Lengkap</span>';
                    }
                }
            ],
           /* [
                'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
                'value' => function ($query) {
                    return $query["totalnks"]; // $data['name'] for array data, e.g. using SqlDataProvider.
                },
            ],*/
            ['class' => 'yii\grid\ActionColumn', 'header'=>'Action'],
            /*['class'    => 'yii\grid\ActionColumn',
                'header'=>'Action',
                'options'=> ['class'=>'action-column'],
                'template' => '{view}{update}{delete}',
                'buttons'  => [
                    'leadView'   => function ($url, $model) {
                        $url = Url::to(['index.php?r=tbmonitoring/view', 'nks' => $model->nks]);
                        return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                    },
                    'leadUpdate' => function($url,$model,$key){
                        $btn = Html::button("<span class='fa fa-pencil'></span>",[
                                'value'=>Url::to('index.php?r=tbmonitoring/create'),'class' => 'btn btn-success', 'id'=>$key,
                                //'value'=>Url::to(['index.php?r=tbmonitoring/update', 'id'=>$key]),
                                'class'=>'modalButton',
                                'data-toggle'=>'modal',
                                'data-placement'=>'botttom',
                                'title'=>'Update'
                        ]);
                        return $btn;
                    },*/
/*                     <p>
        <?= Html::button('Tambahkan NKS', ['value'=>Url::to('index.php?r=tbmonitoring/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
         */           /*'view' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                            'class' => 'activity-view-link',
                            'title' => 'viewModal',
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },
                    'update' => function ($url, $model, $key) {
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>','#', [
                            'class' => 'activity-update-link',
                            'title' => 'updateModal',
                            'data-toggle' => 'modal',
                            'data-target' => '#activity-modal',
                            'data-id' => $key,
                            'data-pjax' => '0',

                        ]);
                    },*/
/*                    'leadUpdate' => function ($url, $model) {
                        $url = Url::to(['index.php?r=tbmonitoring/update', 'class'=>'update-modal-click', 'nks' => $model->nks]);
                        return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                    },
                    'leadDelete' => function ($url, $model) {
                        $url = Url::to(['index.php?r=tbmonitoring/delete', 'nks' => $model->nks]);
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title'        => 'delete',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                            ]);
                    },*/
/*                ]
            ],*/
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
