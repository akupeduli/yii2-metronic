<?php
namespace akupeduli\metronic\assets;

use yii\web\AssetBundle;

class MetronicAsset extends AssetBundle
{
    public $publishOptions = [
        'forceCopy' => (YII_ENV == YII_ENV_DEV)
    ];

    public $depends = [
        'akupeduli\metronic\assets\core\PageLevelAsset',
        'akupeduli\metronic\assets\core\WebFontAsset',
        'akupeduli\metronic\assets\core\ModeAsset',
    ];
}
