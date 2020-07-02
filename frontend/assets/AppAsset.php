<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css',
        'https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css',
        'https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css',
    ];
    public $js = [
        'js/main.js',
        //'https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js',
        'https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
