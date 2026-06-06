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
<header class="flex items-center fixed z-10 top-0 left-0 right-0 shrink-0 h-(--header-height) bg-muted" id="header">
    <div class="kt-container-fluid flex justify-between items-stretch px-5 lg:ps-0 lg:gap-4" id="header_container">
        <div class="flex items-center me-1">
            <div class="flex items-center justify-center lg:w-(--sidebar-width) gap-1 shrink-0">
                <button class="kt-btn kt-btn-icon kt-btn-ghost -ms-2 lg:hidden" data-kt-drawer-toggle="#sidebar">
                    <i class="ki-filled ki-menu"></i>
                </button>
                <a class="mx-1" href="<?= Html::encode(Url::to($homeUrl)) ?>">
                    <img class="dark:hidden min-h-[24px]" src="<?= Html::encode($logoLight) ?>" alt="<?= Html::encode($brand) ?>"/>
                    <img class="hidden dark:block min-h-[24px]" src="<?= Html::encode($logoDark) ?>" alt="<?= Html::encode($brand) ?>"/>
                </a>
            </div>
            <div class="flex items-center">
                <h3 class="text-secondary-foreground text-base hidden md:block"><?= Html::encode($brand) ?></h3>

                <?php if ($accountMenu !== []): ?>
                    <span class="text-sm text-muted-foreground font-medium px-2.5 hidden md:inline">/</span>
                    <div class="kt-menu kt-menu-default" data-kt-menu="true">
                        <div class="kt-menu-item" data-kt-menu-item-offset="0, 10px" data-kt-menu-item-placement="bottom-start" data-kt-menu-item-toggle="dropdown" data-kt-menu-item-trigger="hover">
                            <button class="kt-menu-toggle text-mono font-medium">
                                Account
                                <span class="kt-menu-arrow"><i class="ki-filled ki-down"></i></span>
                            </button>
                            <div class="kt-menu-dropdown w-48 py-2">
                                <?php foreach ($accountMenu as $item): ?>
                                    <div class="kt-menu-item<?= !empty($item['active']) ? ' active' : '' ?>">
                                        <a class="kt-menu-link" href="<?= Html::encode(Url::to($item['url'] ?? '#')) ?>">
                                            <?php if (!empty($item['icon'])): ?>
                                                <span class="kt-menu-icon"><i class="<?= Html::encode($item['icon']) ?>"></i></span>
                                            <?php endif; ?>
                                            <span class="kt-menu-title"><?= Html::encode($item['label'] ?? '') ?></span>
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if ($userMenu !== []): ?>
            <div class="flex items-center gap-2">
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
