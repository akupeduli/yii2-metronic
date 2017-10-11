<?php
namespace akupeduli\metronic\assets\core;

use yii\web\View;
use yii\web\AssetBundle;

class WebFontAsset extends AssetBundle {
    public $sourcePath = '@akupeduli/metronic/web';
    public $js = [
        'https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js',
        'js/webfont.js'
    ];

    public $jsOptions = [
        'position' => View::POS_HEAD,
    ];
}
