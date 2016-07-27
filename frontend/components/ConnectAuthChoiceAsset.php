<?php


namespace frontend\components;

use yii\web\AssetBundle;

class ConnectAuthChoiceAsset extends AssetBundle
{
    public $sourcePath = '@yii/authclient/assets';
    public $js = [
        'authchoice.js',
    ];
    public $depends = [
        'frontend\components\ConnectAuthChoiceStyleAsset',
        'yii\web\YiiAsset',
    ];
}
