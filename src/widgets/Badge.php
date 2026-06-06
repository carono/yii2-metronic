<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Бэйдж Metronic (kt-badge). Доступные варианты — primary, secondary, success, info, warning, destructive, outline.
 */
class Badge extends Widget
{
    public string $label = '';

    /** @var string Вариант стиля. */
    public string $variant = 'primary';

    /** @var string Tailwind-класс размера: 'kt-badge-sm', 'kt-badge-md', 'kt-badge-lg'. */
    public string $size = 'kt-badge-sm';

    public array $options = [];

    public function run(): string
    {
        Html::addCssClass($this->options, "kt-badge {$this->size} kt-badge-{$this->variant}");
        return Html::tag('span', Html::encode($this->label), $this->options);
    }
}
