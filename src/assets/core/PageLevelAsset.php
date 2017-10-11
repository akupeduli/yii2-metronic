<?php
namespace akupeduli\metronic\assets\core;

use yii\web\AssetBundle;
use akupeduli\metronic\Metronic;
use akupeduli\metronic\assets\AssetAddonsTrait;

class PageLevelAsset extends AssetBundle {
    use AssetAddonsTrait;

    public $css = [];

    public $js = [];

    public function __construct(array $config = [])
    {
        $this->sourcePath = Metronic::getComponent()->getAssetPath() . 'snippets/pages/';
        parent::__construct($config);
    }
}
