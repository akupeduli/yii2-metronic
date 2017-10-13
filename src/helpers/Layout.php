<?php

/**
 * @copyright Copyright (c) 2014 Digital Deals s.r.o.
 * @license http://www.digitaldeals.cz/license/
 */

namespace akupeduli\metronic\helpers;

use akupeduli\metronic\Metronic;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * Layout helper
 */
class Layout
{

    /**
     * Retrieves Html options
     * @param string $tag given tag
     * @param boolean $asString if return as string
     * @return array|string
     */
    public static function getHtmlOptions($tag, $options = [], $asString = false)
    {
        $callback = sprintf('static::_%sOptions', strtolower($tag));

        $htmlOptions = call_user_func($callback, $options);

        return $asString ? Html::renderTagAttributes($htmlOptions) : $htmlOptions;
    }

    /**
     * Adds body tag options
     * @param array $options given options
     */
    private static function _bodyOptions($options)
    {
        Html::addCssClass($options, 'm-aside-left--offcanvas m-footer--push m-aside--offcanvas-default');
        Html::addCssClass($options, 'm--skin- m-content--skin-light2');
        Html::addCssClass($options, 'm-aside-left--enabled m-aside-left--skin-dark');

        /** @var Metronic $metronic */
        $metronic = Metronic::getComponent();
        if ($metronic->layoutOption === Metronic::LAYOUT_FLUID) {
            Html::addCssClass($options, "m-page--fluid");
        } else if ($metronic->layoutOption === Metronic::LAYOUT_BOXED) {
            Html::addCssClass($options, "m-page--boxed");

            if ($metronic->layoutBackground) {
                Html::addCssStyle($options, "background-image", "url($metronic->layoutBackground)");
            }
        }

        if ($metronic->headerOption === Metronic::HEADER_FIXED) {
            Html::addCssClass($options, "m-header--fixed m-header--fixed-mobile");
        }

        if ($metronic->sidebarPosition === Metronic::SIDEBAR_POSITION_FIXED) {
            Html::addCssClass($options, "m-aside-left--fixed");
        }

        if ($metronic->footerOption === Metronic::FOOTER_FIXED) {
            Html::addCssClass($options, 'm-footer--fixed');
        }

        return $options;
    }

    /**
     * Adds header tag options
     * @param array $options given options
     */
    private static function _headerOptions($options)
    {
        Html::addCssClass($options, 'page-header navbar');

        $metronic = Metronic::getComponent();
        if (Metronic::HEADER_FIXED === $metronic->headerOption) {
            Html::addCssClass($options, 'navbar-fixed-top');
        } else {
            Html::addCssClass($options, 'navbar-static-top');
        }

        return $options;
    }

    /**
     * Adds actions tag options
     * @param array $options given options
     */
    private static function _actionsOptions($options)
    {
        Html::addCssClass($options, 'page-actions');

        return $options;
    }

    /**
     * Adds top tag options
     * @param array $options given options
     */
    private static function _topOptions($options)
    {
        Html::addCssClass($options, 'page-top');

        return $options;
    }

    /**
     * Adds topmenu tag options
     * @param array $options given options
     */
    private static function _topmenuOptions($options)
    {
        Html::addCssClass($options, 'top-menu');

        return $options;
    }

    /**
     * Adds container tag options
     * @param array $options given options
     */
    private static function _containerOptions($options)
    {
        Html::addCssClass($options, 'container');

        return $options;
    }

    /**
     * Adds clearfix tag options
     * @param array $options given options
     */
    private static function _clearfixOptions($options)
    {
        Html::addCssClass($options, 'clearfix');

        return $options;
    }

}
