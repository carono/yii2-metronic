<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Вкладки Metronic (kt-tabs). Формат `$items`:
 *
 *   [
 *     ['label' => 'Overview', 'content' => '<p>...</p>', 'active' => true],
 *     ['label' => 'Settings', 'content' => '<p>...</p>'],
 *   ]
 */
class Tabs extends Widget
{
    public array $items = [];

    /** @var string Вариант: 'line' | 'pill' | 'bordered'. */
    public string $variant = 'line';

    public array $options = [];

    public array $tabsOptions = [];

    public array $contentOptions = ['class' => 'kt-tab-content pt-4'];

    public string $viewName = 'tabs';

    public function getViewPath()
    {
        return __DIR__ . '/views';
    }

    public function run(): string
    {
        Html::addCssClass($this->tabsOptions, 'kt-tabs kt-tabs-' . $this->variant);
        $this->tabsOptions['data-kt-tabs'] = 'true';

        return $this->render($this->viewName, [
            'items' => $this->items,
            'tabsOptions' => $this->tabsOptions,
            'contentOptions' => $this->contentOptions,
            'options' => $this->options,
            'idPrefix' => $this->getId(),
        ]);
    }
}
