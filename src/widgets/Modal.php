<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Модальное окно Metronic (kt-modal). Begin/End-стиль с опциональной кнопкой-триггером.
 */
class Modal extends Widget
{
    public ?string $title = null;

    public ?string $footer = null;

    public ?array $toggleButton = null;

    public array $options = [];

    public string $openViewName = 'modal-open';

    public string $closeViewName = 'modal-close';

    public function init(): void
    {
        parent::init();

        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        Html::addCssClass($this->options, 'kt-modal');
        $this->options['data-kt-modal'] = 'true';

        echo $this->render($this->openViewName, [
            'options' => $this->options,
            'title' => $this->title,
            'toggleButton' => $this->toggleButton,
        ]);
    }

    public function run(): string
    {
        return $this->render($this->closeViewName, [
            'footer' => $this->footer,
        ]);
    }
}
