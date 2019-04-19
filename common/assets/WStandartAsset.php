<?php

namespace common\assets;

use yii\web\AssetBundle;

class WStandartAsset extends AssetBundle
{
    public $sourcePath = '@common/widgets/views/WStandart/';

    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/script.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
