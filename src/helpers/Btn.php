<?php

declare(strict_types=1);

namespace carono\metronic\helpers;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Хелпер кнопок Metronic. Используется в коде Yii2 как замена `Html::a`/`Html::submitButton`
 * с автоматическим добавлением классов kt-btn.
 *
 * ```php
 * <?= Btn::a('Save', ['site/save'], ['variant' => 'primary']) ?>
 * <?= Btn::submit('Submit', ['variant' => 'primary', 'size' => 'lg']) ?>
 * <?= Btn::icon(['variant' => 'ghost', 'icon' => 'ki-filled ki-cross']) ?>
 * ```
 */
class Btn
{
    /** @var array Доступные варианты — primary, secondary, outline, ghost, destructive, success. */
    private const VARIANT_CLASS = [
        'primary'     => 'kt-btn-primary',
        'secondary'   => 'kt-btn-secondary',
        'outline'     => 'kt-btn-outline',
        'ghost'       => 'kt-btn-ghost',
        'destructive' => 'kt-btn-destructive',
        'success'     => 'kt-btn-success',
        'link'        => 'kt-btn-link',
    ];

    /** @var array Размеры — sm, md, lg. */
    private const SIZE_CLASS = [
        'sm' => 'kt-btn-sm',
        'md' => '',
        'lg' => 'kt-btn-lg',
    ];

    /**
     * Собирает CSS-классы из $options['variant'], $options['size'], $options['icon-only'].
     * Возвращает обновлённые $options.
     */
    public static function options(array $options): array
    {
        $classes = ['kt-btn'];
        $variant = ArrayHelper::remove($options, 'variant', 'primary');
        $size = ArrayHelper::remove($options, 'size', 'md');
        $iconOnly = ArrayHelper::remove($options, 'iconOnly', false);

        if (isset(self::VARIANT_CLASS[$variant])) {
            $classes[] = self::VARIANT_CLASS[$variant];
        }
        if (isset(self::SIZE_CLASS[$size]) && self::SIZE_CLASS[$size] !== '') {
            $classes[] = self::SIZE_CLASS[$size];
        }
        if ($iconOnly) {
            $classes[] = 'kt-btn-icon';
        }
        Html::addCssClass($options, implode(' ', $classes));
        return $options;
    }

    /**
     * Кнопка-ссылка `<a class="kt-btn">`.
     */
    public static function a(string $label, $url = null, array $options = []): string
    {
        $options = self::options($options);
        return Html::a($label, $url, $options);
    }

    /**
     * Кнопка отправки формы `<button type="submit" class="kt-btn">`.
     */
    public static function submit(string $label, array $options = []): string
    {
        $options = self::options($options);
        return Html::submitButton($label, $options);
    }

    /**
     * Иконочная кнопка `<button type="button">` без текста.
     */
    public static function icon(array $options): string
    {
        $icon = ArrayHelper::remove($options, 'icon', 'ki-filled ki-dots-vertical');
        $options['iconOnly'] = true;
        $options = self::options($options);
        return Html::button('<i class="' . Html::encode($icon) . '"></i>', $options);
    }
}
