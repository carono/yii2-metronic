<?php

namespace carono\metronic\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Виджет-скрипты главной страницы Metronic (карта, графики, таблицы команд).
 * Зависит от Metronic core и ApexCharts. Подгружается опционально только там,
 * где нужны соответствующие блоки.
 */
class GeneralWidgetsAsset extends AssetBundle
{
    public $sourcePath = '@vendor/carono/yii2-metronic/src/web/metronic';

    public $js = [
        'js/widgets/general.js',
    ];

    public $jsOptions = [
        'position' => View::POS_END,
        'defer' => true,
    ];

    public $depends = [
        MetronicAsset::class,
        ApexChartsAsset::class,
    ];
}
