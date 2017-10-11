<?php

namespace akupeduli\metronic\assets\core;

use akupeduli\metronic\Metronic;
use yii\web\AssetBundle;

class GlobalMediaAsset extends AssetBundle
{
    public function __construct(array $config = [])
    {
        $metronic = Metronic::getComponent();
        $this->sourcePath = $metronic->getAssetPath() . 'app/media/';

        parent::__construct($config);
    }
}
