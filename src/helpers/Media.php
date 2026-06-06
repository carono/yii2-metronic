<?php

declare(strict_types=1);

namespace carono\metronic\helpers;

use Yii;
use carono\metronic\assets\MetronicAsset;

/**
 * Хелпер для получения URL картинок Metronic, опубликованных через MetronicAsset.
 * Регистрирует бандл и возвращает URL вида `/assets/<hash>/media/<path>`.
 *
 * ```php
 * <img src="<?= Media::url('app/mini-logo-primary.svg') ?>" alt="Logo">
 * <?= Html::img(Media::url('avatars/300-1.png'), ['class' => 'kt-avatar']) ?>
 * ```
 */
class Media
{
    /** @var string|null Кэш baseUrl опубликованного бандла. */
    private static ?string $baseUrl = null;

    public static function url(string $path): string
    {
        if (self::$baseUrl === null) {
            self::$baseUrl = MetronicAsset::register(Yii::$app->view)->baseUrl;
        }
        return self::$baseUrl . '/media/' . ltrim($path, '/');
    }
}
