<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Универсальное меню Metronic (kt-menu). Совместимо с интерфейсом yii\widgets\Menu —
 * принимает массив `items` с label/url/items/icon/active.
 *
 * Используется как вертикальное (по умолчанию) или горизонтальное меню в зависимости от `$mode`.
 */
class Menu extends \yii\widgets\Menu
{
    /** @var string 'vertical' | 'horizontal' — направление меню. */
    public string $mode = 'vertical';

    public $options = ['class' => 'kt-menu kt-menu-default', 'data-kt-menu' => 'true'];

    public $itemOptions = ['class' => 'kt-menu-item'];

    public $linkTemplate = '<a class="kt-menu-link" href="{url}"><span class="kt-menu-title">{label}</span></a>';

    public $labelTemplate = '<span class="kt-menu-link"><span class="kt-menu-title">{label}</span></span>';

    public $submenuTemplate = "\n<div class=\"kt-menu-dropdown py-2\">\n{items}\n</div>\n";

    public $activeCssClass = 'active';

    public $encodeLabels = false;

    public function init()
    {
        if ($this->mode === 'horizontal') {
            Html::addCssClass($this->options, 'flex-row');
        }
        parent::init();
    }

    protected function renderItem($item)
    {
        $linkAttrs = '';
        if (!empty($item['url'])) {
            $linkAttrs = 'href="' . Html::encode(Url::to($item['url'])) . '"';
        }

        $icon = !empty($item['icon'])
            ? '<span class="kt-menu-icon"><i class="' . Html::encode($item['icon']) . '"></i></span>'
            : '';
        $label = $icon . '<span class="kt-menu-title">' . ($this->encodeLabels ? Html::encode($item['label']) : $item['label']) . '</span>';

        if (!empty($item['items'])) {
            return '<button class="kt-menu-toggle">' . $label . '<span class="kt-menu-arrow"><i class="ki-filled ki-down"></i></span></button>';
        }

        if (!empty($item['url'])) {
            return '<a class="kt-menu-link" ' . $linkAttrs . '>' . $label . '</a>';
        }

        return '<span class="kt-menu-link">' . $label . '</span>';
    }

    protected function renderItems($items)
    {
        $n = count($items);
        $lines = [];
        foreach ($items as $i => $item) {
            $options = array_merge($this->itemOptions, $item['options'] ?? []);
            $tag = $options['tag'] ?? 'div';
            unset($options['tag']);
            $class = (array)($options['class'] ?? []);
            if ($item['active']) {
                $class[] = $this->activeCssClass;
            }
            if (!empty($item['items'])) {
                $options['data-kt-menu-item-offset'] = '0, 10px';
                $options['data-kt-menu-item-placement'] = 'bottom-start';
                $options['data-kt-menu-item-toggle'] = 'dropdown';
                $options['data-kt-menu-item-trigger'] = 'click|lg:hover';
            }
            if ($i === 0 && isset($this->firstItemCssClass)) {
                $class[] = $this->firstItemCssClass;
            }
            if ($i === $n - 1 && isset($this->lastItemCssClass)) {
                $class[] = $this->lastItemCssClass;
            }
            $options['class'] = implode(' ', array_unique(array_filter($class)));

            $menu = $this->renderItem($item);
            if (!empty($item['items'])) {
                $submenuTemplate = $item['submenuTemplate'] ?? $this->submenuTemplate;
                $menu .= strtr($submenuTemplate, [
                    '{items}' => $this->renderItems($item['items']),
                ]);
            }
            $lines[] = Html::tag($tag, $menu, $options);
        }
        return implode("\n", $lines);
    }
}
