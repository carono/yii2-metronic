<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Боковой drawer (kt-drawer). Begin/End-стиль.
 *
 * Сторона раскрытия задаётся свойством `$placement`: 'start' (по умолчанию) или 'end'.
 */
class Drawer extends Widget
{
    public string $placement = 'start';

    public ?string $title = null;

    public ?array $toggleButton = null;

    public array $options = [];

    public string $openViewName = 'drawer-open';

    public string $closeViewName = 'drawer-close';

    public function init(): void
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        Html::addCssClass($this->options, 'kt-drawer kt-drawer-' . $this->placement);
        $this->options['data-kt-drawer'] = 'true';

        echo $this->render($this->openViewName, [
            'options' => $this->options,
            'title' => $this->title,
            'toggleButton' => $this->toggleButton,
        ]);
    }

    public function run(): string
    {
        return $this->render($this->closeViewName, []);
    }
}
