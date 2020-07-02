<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ExportdataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'File Export Data Susenas';
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
<div class="exportdata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Upload', ['value'=>Url::to('index.php?r=exportdata/upload'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
     <div class="text-left">
        <?php
            Modal::begin([
                'header'=>'<h4>Upload File Export Data Susenas</h4>',
                'id'=>'modal',
                'size'=>'modal-md',
            ]);

            echo "<div id='modalContent'></div>";

            Modal::end();
        ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idpost',
            //'fileexport',
            [
                'attribute'=>'fileexport',
                'format'=>'html',
                'value'=>function($model){
                    return Html::a($model->fileexport, ['download','fileexport'=> $model->fileexport]);
                }
            ],
            'keterangan',
            //'dateupload',
            [
                'attribute'=>'dateupload',
                'value'=>'dateupload',
                'format'=>'raw',
                'label'=>"Waktu Upload",
                //'options'=>['width' => '115'],
                /*'size'=>'md',*/
                'filter'=>DatePicker::widget([
                    'model'=>$searchModel,
                    'name'=>'ExportdataSearch[dateupload]',
                    'value'=> ArrayHelper::getValue($_GET, "ExportdataSearch.dateupload"),
                    'attribute'=>'dateupload',
                        'pluginOptions'=>[
                            'todayHighlight' => true,
                            'autoclose'=>true,
                            'format'=>'yyyy-mm-dd',
                            'options' => [
                                'class' => 'form-control'
                            ],
                        ]
                ])
            ],
            //'id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
</div>
