<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Mega-menu для layout demo9 (под header-ом, с dropdown'ами).
 *
 * Формат `$items`:
 *   ['label' => 'Account', 'url' => ['account/index'], 'active' => true, 'items' => [...подпункты...]]
 *
 * Подпункты выводятся в dropdown через KTMenu.
 */
class TopNav extends Widget
{
    public array $items = [];

    public string $id = 'navbar';

    public function run(): string
    {
        return $this->render('topnav', [
            'items' => $this->items,
            'id' => $this->id,
        ]);
    }
}
