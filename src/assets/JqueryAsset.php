<?php

namespace carono\metronic\assets;

use carono\yii2bower\NpmAsset;

/**
 * jQuery из @npm/jquery. Используется только опциональными виджетами (DataTables и т.д.).
 * В базовый layout demo3/demo9 НЕ включается.
 */
class JqueryAsset extends NpmAsset
{
    public $packages = [
        'jquery' => [
            'sourcePath' => 'dist',
            'jquery.min.js',
        ],
    ];
}
