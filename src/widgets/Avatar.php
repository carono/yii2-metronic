<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Аватар Metronic (kt-avatar). Поддерживает картинку или текстовые инициалы.
 *
 * Размер задаётся свойством `$size` (CSS-класс, например 'size-9'). Статус (online/offline)
 * — через `$status`.
 */
class Avatar extends Widget
{
    /** @var string|null URL картинки. Если null — выводятся инициалы. */
    public ?string $src = null;

    /** @var string Инициалы (показываются если нет картинки). */
    public string $initials = '';

    /** @var string Tailwind-класс размера: 'size-6', 'size-8', 'size-9', 'size-10', ... */
    public string $size = 'size-9';

    /** @var string|null 'online' | 'offline' | null. */
    public ?string $status = null;

    public array $options = [];

    public string $viewName = 'avatar';

    public function run(): string
    {
        Html::addCssClass($this->options, 'kt-avatar ' . $this->size);

        return $this->render($this->viewName, [
            'src' => $this->src,
            'initials' => $this->initials,
            'status' => $this->status,
            'options' => $this->options,
        ]);
    }
}
