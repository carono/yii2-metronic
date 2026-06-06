<?php

namespace carono\metronic\assets;

use carono\yii2bower\NpmAsset;

class ClipboardAsset extends NpmAsset
{
    public $packages = [
        'clipboard' => [
            'sourcePath' => 'dist',
            'clipboard.min.js',
        ],
    ];

    public $depends = [
        MetronicAsset::class,
    ];
}
