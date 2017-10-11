<?php

/** @var \yii\web\View $this */
/** @var string $content */

use akupeduli\metronic\helpers\Layout;
use akupeduli\metronic\Metronic;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var Metronic $metronic */
$metronic = Metronic::getComponent();
$metronic->registerAsset($this);

$this->beginPage();

?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="no-js">
    <head>
        <meta charset="<?php echo Yii::$app->charset; ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <?php echo Html::csrfMetaTags(); ?>
        <title><?php echo Html::encode($this->title); ?></title>
        <script type="text/javascript">
          const BASE_URL = '<?= Url::base(true); ?>';
        </script>

        <?php $this->head(); ?>
    </head>
    <body <?php

    // handle custom body attribute
    $customBodyAttr = [
        'class' => ArrayHelper::getValue($this->params, 'bodyClass', [])
    ];

    if(empty($customBodyAttr['class'])) {
        $customBodyAttr = Layout::getHtmlOptions('body');
    }

    echo Html::renderTagAttributes($customBodyAttr);

    ?>>
    <?php $this->beginBody(); ?>
    <div class="m-grid m-grid--hor m-grid--root m-page">
    <?php echo $content; ?>
    </div>

    <?php $this->endBody(); ?>

    </body>
</html>

<?php

$this->endPage();
