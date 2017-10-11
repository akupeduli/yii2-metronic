<?php

namespace akupeduli\metronic;

use akupeduli\metronic\assets\core\PageLevelAsset;
use akupeduli\metronic\assets\core\ModeAsset;
use yii\base\BootstrapInterface;
use yii\helpers\ArrayHelper;

class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // run this if only the remark component is loaded / defined
        if ($app->has(Metronic::$componentName)) {
            // setup default params for remark template
            $app->params = ArrayHelper::merge(require(__DIR__ . '/config/params.php'), \Yii::$app->params);

            if (!isset($app->assetManager->bundles[PageLevelAsset::className()])) {
                $app->assetManager->bundles[PageLevelAsset::className()] = [];
            }

            $app->assetManager->bundles[PageLevelAsset::className()] = ArrayHelper::merge([
                'addons' => [
                    Metronic::getComponent()->loginRoute => [
                        'js' => [ 'user/login.js' ],
                        'depends' => [
                            ModeAsset::className()
                        ]
                    ]
                ]
            ], $app->assetManager->bundles[PageLevelAsset::className()]);

            // override the definitions if any
            \Yii::$container->setDefinitions(require(__DIR__ . '/config/components.php'));
        } else {
            \Yii::info('Component ' . Metronic::$componentName . ' is not loaded. No need to set the definitions.');
        }
    }
}
