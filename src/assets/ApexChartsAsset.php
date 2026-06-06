<?php

namespace carono\metronic\assets;

use carono\yii2bower\NpmAsset;

/**
 * ApexCharts — через npm-asset/apexcharts.
 * NpmAsset читает @npm/apexcharts/package.json и формирует AssetBundle.
 * Поле main в apexcharts указывает на dist/apexcharts.common.js (CJS),
 * поэтому подключаем браузерный bundle и стили вручную.
 */
class ApexChartsAsset extends NpmAsset
{
    public $packages = [
        'apexcharts' => [
            'sourcePath' => 'dist',
            'apexcharts.css',
            'apexcharts.min.js',
        ],
    ];
}
