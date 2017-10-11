<?php

namespace akupeduli\metronic\assets\core;

use akupeduli\metronic\Metronic;
use yii\web\AssetBundle;

class ModeAsset extends AssetBundle
{
    public $depends = [
        'akupeduli\metronic\assets\core\CoreAsset',
    ];
    
    public $css = [
        'base/style.bundle.css'
    ];
    
    public $js = [
        'base/scripts.bundle.js'
    ];
    
    public function __construct(array $config = [])
    {
        $metronic = Metronic::getComponent();
        $this->sourcePath = $metronic->getAssetPath() . 'demo/' . $metronic->version;

        parent::__construct($config);
    }
    
    public static function noPublish() {
        \Yii::$container->setDefinitions([
            self::className() => [
                'css' => [],
                'js' => []
            ]
        ]);
    }
}
