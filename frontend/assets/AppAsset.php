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
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
        'css/awesome-bootstrap-checkbox.css',
        'css/colorpicker.css',
        'css/style.css',
        'css/responsive.css',
    ];
    public $js = [
        'js/jquery.scrollTo.min.js',
        //'https://maps.googleapis.com/maps/api/js?key=AIzaSyBKfua7OF-x1nGhOpsRjqBTddS44FSLWJE',
        'js/colorpicker.js',
        'js/toastr.js',
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
