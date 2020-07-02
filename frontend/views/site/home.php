<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Userspo */
/*<h1><center>Selamat Datang di Halaman SPOnline 2020</center></h1>
<h2><center>Badan Pusat Statistik Kabupaten Batu Bara</center></h2>*/

$this->title = '';
?>
<div class="site-index">

    <div class="jumbotron">
        <!-- <h1>Selamat Datang di Halaman SPOnline 2020</h1> -->

        <p class="lead">Badan Pusat Statistik Kabupaten Batu Bara</p>

        <p><a class="btn btn-lg btn-success"<?= Html::a('Upload File Split Susenas', ['/uploadolah/index']) ?></a></p>

        <div class="box-body table-responsive no-padding">
        <?= Html::img('@web/logo/homepage1.png', ['alt'=>'<a href="https://www.freepik.com/free-photos-vectors/puzzle">Puzzle vector created by stories - www.freepik.com</a>', 'class'=>'thing']);?>
        </div>

    </div>



    <!-- <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> -->
</div>
