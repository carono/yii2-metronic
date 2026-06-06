<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Карточка Metronic (kt-card) с набором модификаторов.
 *
 * Begin/End-стиль:
 *
 * ```php
 * <?php Card::begin([
 *     'title' => 'API Integrations',
 *     'subtitle' => 'List of connected services',
 *     'icon' => 'ki-filled ki-cloud-change',
 *     'toolbar' => Btn::a('Add', ['#'], ['variant' => 'primary']),
 *     'menu' => [['label' => 'Details', 'url' => '#']],
 *     'variant' => 'grid',
 *     'footer' => Btn::a('Open profile', ['#']),
 * ]) ?>
 *   ...тело карточки...
 * <?php Card::end() ?>
 * ```
 */
class Card extends Widget
{
    public ?string $title = null;

    public ?string $subtitle = null;

    public ?string $icon = null;

    public ?string $toolbar = null;

    /** @var array Пункты dropdown-меню в шапке. */
    public array $menu = [];

    public string $menuIcon = 'ki-filled ki-dots-vertical';

    public string $menuDropdownWidth = 'w-48';

    public ?string $headerBackground = null;

    public ?string $footer = null;

    public string $variant = 'default';

    public bool $shadowless = false;

    public bool $borderless = false;

    public array $options = [];

    public array $bodyOptions = [];

    public array $headerOptions = [];

    public array $footerOptions = [];

    /** @var string Имя view-файла открывающей части. */
    public string $openViewName = 'card-open';

    /** @var string Имя view-файла закрывающей части. */
    public string $closeViewName = 'card-close';

    public function getViewPath()
    {
        return __DIR__ . '/views';
    }

    public function init(): void
    {
        parent::init();

        Html::addCssClass($this->options, 'kt-card');
        if ($this->variant === 'grid') {
            Html::addCssClass($this->options, 'kt-card-grid');
        }
        if ($this->shadowless) {
            Html::addCssClass($this->options, 'shadow-none');
        }
        if ($this->borderless) {
            Html::addCssClass($this->options, 'kt-card-borderless');
        }

        Html::addCssClass($this->bodyOptions, 'kt-card-content');
        Html::addCssClass($this->headerOptions, 'kt-card-header');
        Html::addCssClass($this->footerOptions, 'kt-card-footer');

        echo $this->render($this->openViewName, [
            'options' => $this->options,
            'bodyOptions' => $this->bodyOptions,
            'headerOptions' => $this->headerOptions,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'icon' => $this->icon,
            'toolbar' => $this->toolbar,
            'menu' => $this->menu,
            'menuIcon' => $this->menuIcon,
            'menuDropdownWidth' => $this->menuDropdownWidth,
            'headerBackground' => $this->headerBackground,
            'hasHeader' => $this->hasHeader(),
        ]);
    }

    public function run(): string
    {
        return $this->render($this->closeViewName, [
            'footer' => $this->footer,
            'footerOptions' => $this->footerOptions,
        ]);
    }

    private function hasHeader(): bool
    {
        return $this->title !== null
            || $this->subtitle !== null
            || $this->toolbar !== null
            || $this->menu !== []
            || $this->headerBackground !== null;
    }
}
