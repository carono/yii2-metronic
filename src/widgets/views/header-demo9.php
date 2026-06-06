<?php

declare(strict_types=1);

/**
 * @var string $brand
 * @var string $logoLight
 * @var string $logoDark
 * @var string $homeUrl
 * @var array  $accountMenu
 * @var array  $userMenu
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<header class="flex items-center transition-[height] shrink-0 bg-background h-(--header-height)"
        data-kt-sticky="true"
        data-kt-sticky-class="transition-[height] fixed z-10 top-0 left-0 right-0 shadow-xs backdrop-blur-md bg-background/70 border border-border"
        data-kt-sticky-name="header"
        data-kt-sticky-offset="100px"
        id="header">
    <div class="kt-container-fixed flex lg:justify-between items-center gap-2.5">
        <div class="flex items-center gap-1 lg:w-[400px] grow lg:grow-0">
            <button class="kt-btn kt-btn-icon kt-btn-ghost -ms-2.5 lg:hidden" data-kt-drawer-toggle="#navbar">
                <i class="ki-filled ki-menu"></i>
            </button>
            <div class="flex items-center gap-2">
                <a class="flex items-center shrink-0" href="<?= Html::encode(Url::to($homeUrl)) ?>">
                    <img class="dark:hidden w-8 shrink-0" src="<?= Html::encode($logoLight) ?>" alt="<?= Html::encode($brand) ?>"/>
                    <img class="hidden dark:inline-block w-8 shrink-0" src="<?= Html::encode($logoDark) ?>" alt="<?= Html::encode($brand) ?>"/>
                </a>
                <h3 class="text-mono text-lg font-medium hidden md:block"><?= Html::encode($brand) ?></h3>
            </div>
        </div>

        <div class="kt-input hidden lg:flex lg:w-60">
            <i class="ki-filled ki-magnifier"></i>
            <input class="min-w-0" placeholder="Search" type="text" value="">
        </div>

        <?php if ($userMenu !== []): ?>
            <div class="flex items-center gap-2 lg:gap-3.5 lg:w-[400px] justify-end">
                <?php foreach ($userMenu as $item): ?>
                    <a class="kt-btn kt-btn-icon kt-btn-ghost" href="<?= Html::encode(Url::to($item['url'] ?? '#')) ?>" data-kt-tooltip="" data-kt-tooltip-placement="bottom">
                        <i class="<?= Html::encode($item['icon'] ?? 'ki-filled ki-question') ?>"></i>
                        <?php if (!empty($item['label'])): ?>
                            <span class="kt-tooltip" data-kt-tooltip-content="true"><?= Html::encode($item['label']) ?></span>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</header>
