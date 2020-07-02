<?php

use yii\helpers\Html;
use app\models\User;
use app\models\Uploadolah;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UploadolahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'File Split Data';
$this->params['breadcrumbs'][] = $this->title;
?>
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Upload File', ['upload'], ['class' => 'btn btn-primary']) ?>
    </p>

    <div class="row">
        <?php
        foreach ($uploadolahs as $uploadolah) {
        ?>

        <div class="col-md-3">
            <div class="img-thumbnail" style="height: 255px"> <!-- class="card" -->
                <img src="<?php echo Yii::getAlias('@webroot').'/'.$uploadolah->keterangan; ?>" class="img-fluide" height="155" width="255">
                <div class="card-body">
                    <h5 class="card-title" style="word-wrap:break-word"><?php echo $uploadolah->filesplit; ?></h5>
                    <div class="text-right">
                        <?php
                            echo Html::a($uploadolah->filesplit, ['download','filesplit'=> $uploadolah->filesplit], ['class' => 'btn btn-primary']);
                            echo "&nbsp;";
                            echo Html::a('Delete', ['delete', 'filesplit'=>$uploadolah->filesplit], ['class' => 'btn btn-danger']);
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>  
    </div>