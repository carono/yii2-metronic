<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use Yii;
use yii\base\Widget;

/**
 * Общий футер для обоих layout-ов.
 */
class Footer extends Widget
{
    /** @var string Текст копирайта (левая часть). */
    public string $copyright = '';

    /** @var array Доп. ссылки в правой части: [['label' => 'Docs', 'url' => '/docs'], ...] */
    public array $links = [];

    /** @var string Layout: 'demo3' использует kt-container-fluid, 'demo9' — kt-container-fixed. */
    public string $layout = 'demo3';

    public string $viewName = 'footer';

    public function init(): void
    {
        parent::init();
        if ($this->copyright === '') {
            $this->copyright = date('Y') . '© ' . Yii::$app->name;
        }
    }

    public function run(): string
    {
        return $this->render($this->viewName, [
            'copyright' => $this->copyright,
            'links' => $this->links,
            'layout' => $this->layout,
        ]);
    }
}
