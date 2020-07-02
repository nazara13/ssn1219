<?php
use yii\helpers\Html;
//use yii\grid\GridView;
use app\models\Instansi;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use app\models\Tbmonitoring;
use app\models\Tbbs;
use app\models\TbbsSearch;
use app\models\Tbpml;
use app\models\TbpmlSearch;
use app\models\Tbpcl;
use app\models\TbpclSearch;
use kartik\select2\Select2;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use yii\data\SqlDataProvider;
use kartik\grid\GridView;
use kartik\grid\ExpandRowColumn;
use \yii\bootstrap\Collapse;
use mitrm\amcharts\AmChart;

$this->title = 'Monitoring Dokumen Entri';
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

<div class="tbmonitoring-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <p>
        <?= Html::a('Create Tbmonitoring', ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->
    <p>
        <?= Html::button('Tambahkan NKS', ['value'=>Url::to('index.php?r=tbmonitoring/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
        <?php 
        //echo \yii\helpers\Html::a( 'Kembali', Yii::$app->request->referrer, ['class' => 'btn btn-primary']); //kembali ke halaman aksi paling terakhir
        //echo \yii\helpers\Html::a('Refresh',['/tbmonitoring/hitung'], ['data-method' => 'post', 'class' => 'btn btn-primary']) //kembali render ke link yg ditentukan
        //['label' => 'Entri Data', 'icon' => 'glyphicon glyphicon-refresh', 'url' => ['/tbmonitoring/hitung'],],
        ?>
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

    <?php
        $chartConfiguration = [
    'dataProvider' => [
        ['author' => 'Buku', 'title' => 'Buku', 'count' => 10],
        ['author' => 'Pensil', 'title' => 'Pensil', 'count' => 15],
        ['author' => 'Pulpen', 'title' => 'Pulpen', 'count' => 15],
    
    ],
    'type' => 'pie',
    'legend' => [
        'markerType' => 'circle',
        'position' => 'right',
        'marginRight' => 30,
        'autoMargins' => false,
        'labelWidth' => 310,
        'labelText' => '[[title]]',
        'valueText' => '[[value]] ([[percents]]%)',
        'width' => 390,
    ],
    'maxLabelWidth' => 150,
    'marginLeft' => -100,
    'marginTop' => 0,
    'marginBottom' => 0,
    'labelText' => '[[value]] ([[percents]]%)',
    'valueField' => 'count',
    'titleField' => 'title',
    'descriptionField' => 'author',
    'balloonText' => '[[title]]<br><span style=\'font-size:12px\'><b>[[value]]</b> ([[percents]]%)</span>',
];
echo mitrm\amcharts\AmChart::widget([
    'chartConfiguration' => $chartConfiguration, 
    'options' => ['id' => 'chart_id'],
    'width' => '100%',
    'language' => 'ru',
]);
    ?>


<div class="box-body table-responsive no-padding">
<?php $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn',
        //'width'=>'5%'
        ],
        [
            'attribute' => 'id',
            'label' => 'Petugas Entri',
            'value'=>'tbpml.user.fullname',
            'vAlign' => 'middle',
             //fungsi grouping
            'value' => function ($model, $key, $index, $widget) { 
                return $model->tbpml->user->fullname;
            },
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Petugas Entri'],
            'group' => true,  // enable grouping
            //'width' => '5%',
        ],

        [
        	'attribute' => 'kodepml',
            'label' => 'Petugas Pengawas',
            'value'=>'tbpml.namapml',
            'vAlign' => 'middle',

            //fungsi grouping
            'value' => function ($model, $key, $index, $widget) { 
                return $model->tbpml->namapml;
            },
            'filterInputOptions' => ['placeholder' => 'Petugas Pengawas'],
            'group' => true,  // enable grouping
			//'width' => '10%',


            //fungsi untuk ExpandRowColumn
			/*'class' => 'kartik\grid\ExpandRowColumn',
			'value' => function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail' => function($model, $key, $index, $column) {
				$searchModel = new TbpmlSearch();
				$searchModel->kodepml = $model->kodepml;
				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

				return Yii::$app->controller->renderPartial('pmlexpand',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
				]);

			}*/
        ],
        [
        	'attribute' => 'kodepml',
            'label' => 'Petugas Pengawas',
            'value'=>'tbpml.namapml',
            'vAlign' => 'middle',

            //fungsi grouping
            'value' => function ($model, $key, $index, $widget) { 
                return $model->tbpml->namapml;
            },
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Petugas Pengawas'],
            'group' => true,  // enable grouping
			//'width' => '10%',


            //fungsi untuk ExpandRowColumn
			'class' => 'kartik\grid\ExpandRowColumn',
			'value' => function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail' => function($model, $key, $index, $column) {
				$searchModel = new TbpmlSearch();
				$searchModel->kodepml = $model->kodepml;
				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

				return Yii::$app->controller->renderPartial('pmlexpand',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
				]);

			}
        ],
        [
        	'attribute' => 'kodepcl',
            'label' => 'Petugas Pencacah',
            'value'=>'tbpcl.namapcl',
            'vAlign' => 'middle',

             //fungsi grouping
            'value' => function ($model, $key, $index, $widget) { 
                return $model->tbpcl->namapcl;
            },
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Petugas Entri'],
            'group' => true,  // enable grouping
            //'width' => '5%',
			//'width' => '10%',


			//fungsi untuk ExpandRowColumn
			/*'class' => 'kartik\grid\ExpandRowColumn',
			'value' => function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail' => function($model, $key, $index, $column) {
				$searchModel = new TbpclSearch();
				$searchModel->kodepcl = $model->kodepcl;
				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

				return Yii::$app->controller->renderPartial('pclexpand',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
				]);

			}*/
        ],
        [
        	'attribute' => 'kodepcl',
            'label' => 'Petugas Pencacah',
            'value'=>'tbpcl.namapcl',
            'vAlign' => 'middle',

             //fungsi grouping
            'value' => function ($model, $key, $index, $widget) { 
                return $model->tbpcl->namapcl;
            },
            'filterWidgetOptions' => [
                'pluginOptions' => ['allowClear' => true],
            ],
            'filterInputOptions' => ['placeholder' => 'Petugas Entri'],
            'group' => true,  // enable grouping
            //'width' => '5%',
			//'width' => '10%',


			//fungsi untuk ExpandRowColumn
			'class' => 'kartik\grid\ExpandRowColumn',
			'value' => function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail' => function($model, $key, $index, $column) {
				$searchModel = new TbpclSearch();
				$searchModel->kodepcl = $model->kodepcl;
				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

				return Yii::$app->controller->renderPartial('pclexpand',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
				]);

			}
        ],
        [
            'attribute' => 'nks',
            'label' => 'NKS',
            'format' => 'raw',
            'vAlign' => 'middle',
            'value' => function($data){
                return Html::a($data->nks,'#',['onclick'=>'detail(this,'.$data->nks.'); return false;']);
            }
        ],
        [
            'attribute' => 'nks',
            'label' => 'NKS',
            'format' => 'raw',
            'vAlign' => 'middle',
            //fungsi untuk ExpandRowColumn
			'class' => 'kartik\grid\ExpandRowColumn',
			'value' => function ($model, $key, $index, $column) {
				return GridView::ROW_COLLAPSED;
			},
			'detail' => function($model, $key, $index, $column) {
				$searchModel = new TbbsSearch();
				$searchModel->nks = $model->nks;
				$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

				return Yii::$app->controller->renderPartial('nksexpand',[
					'searchModel' => $searchModel,
					'dataProvider' => $dataProvider,
				]);

			}
        ],
        [
			'attribute' => 'ruta1',
			'label' => 'Ruta 1',
			'format' => 'html',
			'vAlign' => 'middle',
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
        [
            'attribute' => 'ruta2',
                'label' => 'Ruta 2',
                'format' => 'html',
                'vAlign' => 'middle',
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
        [
            'attribute' => 'ruta3',
                'label' => 'Ruta 3',
                'format' => 'html',
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
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
                'vAlign' => 'middle',
                'pageSummary'=> 'Total',
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
            [
                'attribute' => 'totalruta',
                'label' => 'Total Ruta',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => 'totalruta',
                'vAlign' => 'middle',
                'hAlign'=>'right',
                'pageSummary'=>true, //mengaktifkan kolom yang ingin dijumlahkan total nilai baris
            ],
            [
                'attribute' => 'target',
                'label' => 'Target Ruta',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => 'target',
                'vAlign' => 'middle',
                'hAlign'=>'right',
                'pageSummary'=>true, //mengaktifkan kolom yang ingin dijumlahkan total nilai baris
            ],
            [
                'attribute' => 'persen',
                'label' => '%',
                'format' => 'html',
                'headerOptions' => ['class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
                'value' => 'persen',
                'vAlign' => 'middle',
                'hAlign'=>'right',
                //'pageSummary'=>$myPersentase, //mengaktifkan kolom yang ingin dijumlahkan total nilai baris
            ],
            [
                'attribute' => 'Total',
                'label' => 'Status Dokumen',
                'format' => 'html',
                'vAlign' => 'middle',
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
            ['class' => 'kartik\grid\ActionColumn', 'header'=>'Action'],

    ];

    

    echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
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
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'], 
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        'summary'=>'',
        //'showFooter'=>true,
        'containerOptions' => ['style'=>'overflow: auto'],
        /*'beforeHeader'=>[
        [
	            'columns'=>[
	                ['content'=>'Header Before 1', 'options'=>['colspan'=>12, 'class'=>'text-center warning']], 
	                ['content'=>'Header Before 2', 'options'=>['colspan'=>4, 'class'=>'text-center warning']], 
	                ['content'=>'Header Before 3', 'options'=>['colspan'=>3, 'class'=>'text-center warning']], 
	            ],
	            'options'=>['class'=>'skip-export'] // remove this row from export
	        ]
	    ],*/
        'beforeHeader'=>[
            [
                'columns'=>[
                    //['content'=> $this->title, 'options'=>['colspan'=>4, 'class'=>'text-center warning']], //cuma satu kolom header
                    ['content'=> 'Petugas Susenas Maret 2020','options'=>['colspan'=>6, 'class'=>'text-center warning', 'vAlign' => 'middle']],
                    ['content'=> 'No Kode Sampel','options'=>['colspan'=>2, 'class'=>'text-center info', 'vAlign' => 'middle']],
                    ['content'=> 'Rumah Tangga Sampel','options'=>['colspan'=>12, 'class'=>'text-center warning', 'vAlign' => 'middle']],
            //        ['content'=>'', 'options'=>['colspan'=>0, 'class'=>'text-center warning']], //uncomment kalau mau membuat header kolom-2
              //      ['content'=>'', 'options'=>['colspan'=>0, 'class'=>'text-center warning']],
                ], //uncomment kalau mau membuat header kolom-3
                'options'=>['class'=>'skip-export'] 
            ]
        ],
        'exportConfig' => [
              GridView::PDF => ['label' => 'Simpan sebagai PDF'],
              GridView::EXCEL => ['label' => 'Simpan sebagai EXCEL'], //untuk menghidupkan button export ke Excell
              GridView::HTML => ['label' => 'Simpan sebagai HTML'], //untuk menghidupkan button export ke HTML
              GridView::CSV => ['label' => 'Simpan sebagai CSV'], //untuk menghidupkan button export ke CVS
          ],
          
        'toolbar' =>  [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['/tbmonitoring/create'], ['id'=>'modalButton', 'class' => 'btn btn-success', 'title'=>'Tambahkan NKS']) . ' '.
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', ['/tbmonitoring/hitung'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>'Refresh'])
            ],
            '{export}', 
            '{toggleData}' //uncoment untuk menghidupkan button menampilkan semua data..
        ],
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => false,
        'hover' => true,
        //'floatHeader' => true,
        'showPageSummary' => true, //true untuk menjumlahkan nilai di suatu kolom, kebetulan pada contoh tidak ada angka.
        'panel' => [
            'type' => GridView::TYPE_PRIMARY
        ],

    ]);
     ?>

    


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




                <!-- Reload page automatically -->

				<!-- <script type="text/javascript">

				window.onload = setupRefresh;


				function setupRefresh() {

				setTimeout("refreshPage();", 30000); // milliseconds

				}

				function refreshPage() {

				window.location = location.href;

				}

				</script>  -->


				<script type="text/javascript">
					$(document).on('pjax:success', function() {
					$("html, body").animate({ scrollTop: $("#gridColumns").position().top }, 300);
					});
				</script>

</div>
</div>
</div>




            