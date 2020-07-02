<?php

use yii\helpers\Html;
use app\models\User;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UploadolahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Upload File Split Susenas';
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
<div class="uploadolah-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::button('Upload', ['value'=>Url::to('index.php?r=uploadolah/upload'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
    <div class="text-left">
        <?php
            Modal::begin([
                'header'=>'<h4>Upload File Split Susenas</h4>',
                'id'=>'modal',
                'size'=>'modal-md',
            ]);

            echo "<div id='modalContent'></div>";

            Modal::end();
        ?>
                      
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-body table-responsive no-padding">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idpost',
            [
                'attribute' => 'Nama Petugas',
                'value' => 'user.fullname',
                'filter' => Html::activeDropDownList($searchModel, 'id', ArrayHelper::map(User::find()->asArray()->all(), 'id','fullname'),['class'=>'form-control','prompt' => 'Nama Petugas']),
            ],
            //'filesplit',
            [
                'attribute'=>'filesplit',
                'format'=>'html',
                'value'=>function($model){
                    return Html::a($model->filesplit, ['download','filesplit'=> $model->filesplit]);
                }
            ],
            //'keterangan',
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
                    'name'=>'UploadolahSearch[dateupload]',
                    'value'=> ArrayHelper::getValue($_GET, "UploadolahSearch.dateupload"),
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
</div>
