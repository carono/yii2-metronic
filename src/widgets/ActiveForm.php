<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

/**
 * ActiveForm с Metronic-стилизацией. По умолчанию использует `ActiveField` из этого же пакета,
 * который оборачивает label/input/error в соответствующие kt-* классы.
 */
class ActiveForm extends \yii\widgets\ActiveForm
{
    public $fieldClass = ActiveField::class;

    public $errorCssClass = 'kt-form-error';

    public $successCssClass = 'kt-form-success';

    public $validatingCssClass = 'kt-form-validating';
}
