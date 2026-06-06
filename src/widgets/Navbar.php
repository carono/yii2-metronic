<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;

/**
 * Горизонтальный navbar для layout demo3 (показывается под header-ом).
 *
 * Формат `$items`:
 *   ['label' => 'Account', 'url' => ['account/index'], 'active' => true]
 */
class Navbar extends Widget
{
    public array $items = [];

    public string $id = 'navbar';

    public string $viewName = 'navbar';

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
