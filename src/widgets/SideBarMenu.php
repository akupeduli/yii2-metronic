<?php
namespace akupeduli\metronic\widgets;

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Menu;
use yii\helpers\ArrayHelper;

class SideBarMenu extends Menu
{
    public $activateParents = true;
    public $activeCssClass = "m-menu__item--active";
    public $headingTemplate = '<h4 class="m-menu__section-text">{label}</h4>';

    public $linkTemplate = '<a {attr}>{icon}{label}{badge}</a>';
    public $linkBadgeTemplate = "<a {attr}>{icon}<span class='m-menu__link-title'>" .
        "<span class='m-menu__link-wrap'>{label}{badge}</span></span></a>";

    protected function _subMenuTemplate()
    {
        $result[] = "<div class='m-menu__submenu'>";
        $result[] = "<span class='m-menu__arrow'></span>";
        $result[] = "<ul class='m-menu__subnav'>\n{items}\n</ul>";
        $result[] = "</div>";

        return implode(PHP_EOL, $result);
    }

    public function init()
    {
        $this->submenuTemplate = $this->_subMenuTemplate();

        Html::addCssClass($this->itemOptions, 'm-menu__item');
        Html::addCssClass($this->options, 'm-menu__nav m-menu__nav--dropdown-submenu-arrow');
        $this->options = ArrayHelper::merge($this->options, [
            'aria-haspopup' => "true"
        ]);

        parent::init();
    }

    /**
     * Check if the item is a heading or not
     *
     * @param $item
     * @return bool
     */
    private function _isHeading($item)
    {
        return (
            $item['level'] === 1 &&
            empty(ArrayHelper::getValue($item, 'url', null)) &&
            empty(ArrayHelper::getValue($item, 'items', null))
        );
    }

    protected function renderItems($items, $level = 1)
    {
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, ArrayHelper::getValue($item, 'options', []));
            $tag     = ArrayHelper::remove($options, 'tag', 'li');
            $class   = [];

            // set parent flag
            $item['level'] = $level;

            // overwrite class for heading
            if ($this->_isHeading($item)) {
                $options['class'] = 'm-menu__section';
            } else {
                if ($item['active']) {
                    $class[] = $this->activeCssClass;
                }

                if (!empty($item['items']) && $item['active']) {
                    $class[] = 'm-menu__item--open';
                }

                if (!empty($item['items'])) {
                    $class[] = "m-menu__item--submenu";
                }
            }

            Html::addCssClass($options, $class);

            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $menu .= strtr($this->submenuTemplate, [
                    '{items}' => $this->renderItems($item['items'], $level + 1),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }
        return implode("\n", $lines);
    }

    protected function renderItem($item)
    {
        if ($this->_isHeading($item)) {
            $template  = ArrayHelper::getValue($item, 'template', $this->headingTemplate);
            $template .= '<i class="m-menu__section-icon flaticon-more-v3"></i>';

            return strtr($template, [
                '{label}' => ArrayHelper::getValue($item, 'label', ''),
            ]);
        }

        $template = empty($item['badge']) ? $this->linkTemplate : $this->linkBadgeTemplate;

        return strtr(ArrayHelper::getValue($item, 'template', $template), [
            '{attr}'  => $this->_formatItemAttr($item),
            '{icon}'  => $this->_formatItemIcon($item),
            '{label}' => $this->_formatItemLabel($item),
            '{badge}' => $this->_formatItemBadge($item),
        ]);
    }

    /**
     * Format out item url
     * @param array $item given item
     * @return string item url
     */
    private function _formatItemAttr($item)
    {
        $options = [
            'class' => 'm-menu__link',
            'href'  => ArrayHelper::getValue($item, 'url', '#')
        ];

        if (!empty($item['items'])) {
            Html::addCssClass($options, 'm-menu__toggle');
            $options['href'] = 'javascript:void(0);';
        } else {
            // route the url
            $options['href'] = Url::to($options['href']);
        }

        return Html::renderTagAttributes($options);
    }

    /**
     * Pulls out item label
     * @param array $item given item
     * @return string item label
     */
    private function _formatItemLabel($item)
    {
        $label = ArrayHelper::getValue($item, 'label', '');

        return sprintf(Html::tag('span', $label, ['class' => 'm-menu__link-text']));
    }

    /**
     * Pulls out item icon
     * @param array $item given item
     * @return string item icon
     */
    private function _formatItemIcon($item)
    {
        $icon = ArrayHelper::getValue($item, 'icon', null);

        if ($icon) {
            // add space after icon
            return Html::tag("i", "", [
                "class" => "m-menu__link-icon {$icon}"
            ]) . ' ';
        }

        return '';
    }

    /**
     * Pulls out item badge
     * @param array $item given item
     * @return string item badge
     */
    private function _formatItemBadge($item)
    {
        // only show badge or arrow

        $badge = ArrayHelper::getValue($item, 'badge', null);

        if ($badge !== null) {
            return Html::tag(
                "span", 
                Html::tag( "span", $badge["label"],  [
                    "class" => "m-badge m-badge--" . $badge['type']
                ]), 
                [
                    "class" => "m-menu__link-badge"
                ]
            );
        } else {
            if (!empty($item['items'])) {
                return Html::tag('i', '', [
                    "class" => "m-menu__ver-arrow la la-angle-right"
                ]);
            }
        }

        return '';
    }
}
