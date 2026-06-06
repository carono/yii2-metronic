<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;

/**
 * Вертикальное иконочное меню для layout demo3.
 *
 * Каждый пункт — это иконка с tooltip-ом. Формат `$items`:
 *   [
 *     ['label' => 'Dashboard', 'icon' => 'ki-filled ki-chart-line-star', 'url' => ['site/index'], 'active' => true],
 *     ...
 *   ]
 */
class Sidebar extends Widget
{
    public array $items = [];

    /** @var string id, привязан к селекторам KTDrawer и кнопке-гамбургеру в header. */
    public string $id = 'sidebar';

    /** @var string Имя view-файла для рендера. Можно переопределить для кастомной разметки. */
    public string $viewName = 'sidebar';

    public function getViewPath()
    {
        return __DIR__ . '/views';
    }

    public function run(): string
    {
        return $this->render($this->viewName, [
            'id' => $this->id,
            'items' => $this->items,
        ]);
    }
}
