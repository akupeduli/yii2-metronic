<?php
namespace akupeduli\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

class SideBar extends Widget
{
    /*path of items file*/
    public $itemFile = "";

    public function run()
    {
        $result[] = Html::button(
            Html::tag("i", "", ['class' => 'la la-close']),
            [
                "id" => "m_aside_left_close_btn",
                'class' => 'm-aside-left-close m-aside-left-close--skin-dark'
            ]
        );

        $result[] = Html::beginTag("div", [
            "id" => "m_aside_left",
            "class" => "m-grid__item m-aside-left m-aside-left--skin-dark"
        ]);
        $result[] = Html::beginTag("div", [
            "id" => "m_ver_menu",
            "class" => "m-aside-menu m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark",
            "data-menu-vertical" => "true", 
            "data-menu-scrollable" => "false",
            "data-menu-dropdown-timeout" => 500
        ]);

        $result[] = SideBarMenu::widget([
            'items' => require(\Yii::getAlias($this->itemFile))
        ]);

        $result[] = Html::endTag("div");
        $result[] = Html::endTag("div");

        return implode(" ", $result);
    }
}