<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * ActiveField для Metronic. Структура поля:
 *
 * ```html
 * <div class="kt-form-group">
 *   <label class="kt-form-label">...</label>
 *   <input class="kt-input" .../>
 *   <div class="kt-form-hint">...</div>
 *   <div class="kt-form-error">...</div>
 * </div>
 * ```
 */
class ActiveField extends \yii\widgets\ActiveField
{
    public $template = "{label}\n{input}\n{hint}\n{error}";

    public $options = ['class' => ['widget' => 'kt-form-group flex flex-col gap-1.5']];

    public $labelOptions = ['class' => 'kt-form-label'];

    public $hintOptions = ['class' => 'kt-form-hint text-muted-foreground text-xs', 'tag' => 'div'];

    public $errorOptions = ['class' => 'kt-form-error text-destructive text-xs', 'tag' => 'div'];

    public $inputOptions = ['class' => 'kt-input'];

    public function textInput($options = [])
    {
        $options = ArrayHelper::merge(['class' => 'kt-input'], $options);
        return parent::textInput($options);
    }

    public function passwordInput($options = [])
    {
        $options = ArrayHelper::merge(['class' => 'kt-input'], $options);
        return parent::passwordInput($options);
    }

    public function textarea($options = [])
    {
        $options = ArrayHelper::merge(['class' => 'kt-input min-h-[100px]'], $options);
        return parent::textarea($options);
    }

    public function dropDownList($items, $options = [])
    {
        $options = ArrayHelper::merge(['class' => 'kt-select'], $options);
        return parent::dropDownList($items, $options);
    }

    public function checkbox($options = [], $enclosedByLabel = true)
    {
        $options = ArrayHelper::merge(['class' => 'kt-checkbox', 'labelOptions' => ['class' => 'kt-label flex items-center gap-2']], $options);
        $this->template = "{input}\n{error}";
        return parent::checkbox($options, $enclosedByLabel);
    }

    public function radio($options = [], $enclosedByLabel = true)
    {
        $options = ArrayHelper::merge(['class' => 'kt-radio', 'labelOptions' => ['class' => 'kt-label flex items-center gap-2']], $options);
        $this->template = "{input}\n{error}";
        return parent::radio($options, $enclosedByLabel);
    }

    public function fileInput($options = [])
    {
        $options = ArrayHelper::merge(['class' => 'kt-input'], $options);
        return parent::fileInput($options);
    }
}
