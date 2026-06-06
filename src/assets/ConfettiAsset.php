<?php

namespace carono\metronic\assets;

use carono\yii2bower\NpmAsset;

class ConfettiAsset extends NpmAsset
{
    public $packages = [
        'canvas-confetti' => [
            'sourcePath' => 'dist',
            'confetti.browser.js',
        ],
    ];

    public $depends = [
        MetronicAsset::class,
    ];
}
