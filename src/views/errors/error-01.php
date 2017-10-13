<?php
use akupeduli\metronic\assets\core\GlobalMediaAsset;
$media = GlobalMediaAsset::register($this);
$background = $media->baseUrl . "/img/error/bg1.jpg";
?>
<div class="m-grid__item m-grid__item--fluid m-grid m-error-1" 
    style="background-image: url(<?= $background ?>);">
    <div class="m-error_container">
        <span class="m-error_number">
            <h1><?= $exception->statusCode ?></h1>             
        </span>     
        <p class="m-error_desc">
            OOPS! Something went wrong here
        </p>     
    </div>   
</div>              
        
