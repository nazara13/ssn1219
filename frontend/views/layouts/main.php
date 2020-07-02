<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <!-- <title><?= Html::encode($this->title) ?></title> -->
    <title>Kolom Data</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
/*
    NavBar::begin(['brandLabel' => 'Brand','brandUrl' => Url::$app->homeUrl,]);

        echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-left'],
                        'items' => Menu::NavbarLeft(1)  // argument is id of menu
                    ]); 

        echo Nav::widget([ 'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => Menu::NavbarRight(1)
                    ]);
    NavBar::end();*/
    NavBar::begin([
        //'brandLabel' => Yii::$app->name,
        'brandLabel' => "BPS Batu Bara",
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        //['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'Monitoring', 'url' => ['/tbmonitoring/index']],
        ['label' => 'Upload', 'url' => ['/uploadolah/index']],
        //['label' => 'Upload', 'url' => ['/userspo/create']],
        //['label' => 'Instansi', 'url' => ['/instansi/create']],
        //['label' => 'Progress', 'url' => ['/userspo/index']],
        //['label' => 'Tabel Progress', 'url' => ['/tabelprogress/index']],
        /*['label' => 'About', 'url' => ['/site/about']],*/
        /*['label' => 'Contact', 'url' => ['/site/contact']],*/
    ];
    if (Yii::$app->user->isGuest) {
        //$menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p>Badan Pusat Statistik Kabupaten Batu Bara</p>
        <p>Jl. Lintas Sumatera Lk. 5 Lima Puluh Kota 21255, Telp/Faks (62-622) 697383, Mailbox : batubarakab@bps.go.id</p>
        <p class="pull-center">&copy; <?= Html::a('Kolom Data', ['/site/index']) ?> <?= date('Y') ?></p>
        <!-- <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p> -->

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>





