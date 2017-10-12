<?php
namespace akupeduli\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
* Navbar
*/
class NavBar extends Widget
{
    public $leftNav = null;
    public $rightNav = null;

    public function run()
    {
        $result = Html::beginTag("div", [
            'class' => 'm-stack__item m-stack__item--fluid m-header-head',
            'id' => 'm_header_nav'
        ]);

        $result .= $this->_renderLeftNav();
        $result .= $this->_renderRightNav();

        $result .= Html::endTag("div");

        return $result;
    }

    protected function _renderLeftNav()
    {
        if (is_null($this->leftNav)) {
            return null;
        }

        $result[] = Html::button(
            Html::tag("i", '', ['class' => 'la la-close']),
            [
                'id' => 'm_aside_header_menu_mobile_close_btn',
                'class' => 'm-aside-header-menu-mobile-close m-aside-header-menu-mobile-close--skin-dark'
            ]
        );

        $result[] = Html::beginTag("div", [
            "id" => "m_header_menu",
            "class" => "m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas " .
                "m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark " .
                "m-header-menu--skin-light m-header-menu--submenu-skin-light"
        ]);

        $result[] = $this->render($this->leftNav);

        # m_header_menu
        $result[] = Html::endTag("div");

        return implode(" ", $result);
    }

    protected function _renderRightNav()
    {
        if (is_null($this->rightNav)) {
            return null;
        }

        $result[] = Html::beginTag("div", [
            'id' => 'm_header_topbar',
            "class" => "m-topbar m-stack m-stack--ver m-stack--general"
        ]);
        $result[] = Html::beginTag("div", [
            "class" => "m-stack__item m-topbar__nav-wrapper"
        ]);

        $result[] = $this->render($this->rightNav);

        $result[] = Html::endTag("div");
        $result[] = Html::endTag("div");#

        return implode(" ", $result);
    }
}
