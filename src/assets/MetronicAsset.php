<?php

namespace carono\metronic\assets;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * Базовые ассеты Metronic — Tailwind-стили, KeenIcons, KTUI и core-bundle.
 * Подключается обоими layout-ами (demo3 и demo9). Theme-mode инициализируется здесь же.
 */
class MetronicAsset extends AssetBundle
{
    public $sourcePath = '@vendor/carono/yii2-metronic/src/web';

    public $css = [
        'vendors/keenicons/styles.bundle.css',
        'css/styles.css',
    ];

    public $js = [
        'js/core.bundle.js',
        'vendors/ktui/ktui.min.js',
    ];

    public $jsOptions = [
        'position' => View::POS_END,
    ];

    public $depends = [
        \yii\web\YiiAsset::class,
    ];

    public function init(): void
    {
        parent::init();

        $this->jsOptions['defer'] = true;
    }
}
