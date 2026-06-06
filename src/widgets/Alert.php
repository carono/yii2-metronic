<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

/**
 * Алерты на основе сессионных flash-сообщений Yii.
 * По-умолчанию выводит все flash-уведомления (success/info/warning/danger/error).
 *
 * ```php
 * <?= \carono\metronic\widgets\Alert::widget() ?>
 * ```
 */
class Alert extends Widget
{
    /** @var array Карта flash-тип → CSS-класс kt-alert. */
    public array $alertTypes = [
        'success' => 'kt-alert kt-alert-success',
        'info'    => 'kt-alert kt-alert-info',
        'warning' => 'kt-alert kt-alert-warning',
        'danger'  => 'kt-alert kt-alert-destructive',
        'error'   => 'kt-alert kt-alert-destructive',
    ];

    /** @var bool Показывать ли кнопку закрытия. */
    public bool $closable = true;

    public function run(): string
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();
        $out = '';
        foreach ($flashes as $type => $messages) {
            if (!isset($this->alertTypes[$type])) {
                continue;
            }
            $messages = (array)$messages;
            foreach ($messages as $message) {
                $out .= Html::tag(
                    'div',
                    Html::encode((string)$message)
                    . ($this->closable
                        ? '<button class="kt-alert-close" data-kt-alert-dismiss="true" type="button"><i class="ki-filled ki-cross"></i></button>'
                        : ''),
                    ['class' => $this->alertTypes[$type], 'role' => 'alert']
                );
            }
            $session->removeFlash($type);
        }
        return $out;
    }
}
