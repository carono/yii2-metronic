<?php

declare(strict_types=1);

/**
 * @var array  $items
 * @var string $id
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="bg-muted hidden lg:flex lg:items-stretch border-y border-input lg:mb-10 [--kt-drawer-enable:true] lg:[--kt-drawer-enable:false]"
     data-kt-drawer="true"
     data-kt-drawer-class="kt-drawer kt-drawer-start fixed z-10 top-0 bottom-0 w-full me-5 max-w-[250px] p-5 lg:p-0 overflow-auto"
     id="<?= Html::encode($id) ?>">
    <div class="kt-container-fixed lg:flex lg:flex-wrap lg:justify-between lg:items-center gap-2 px-0 lg:px-7.5">
        <div class="kt-menu kt-menu-default flex-col lg:flex-row gap-5 lg:gap-7.5 p-5 lg:p-0" data-kt-menu="true">
            <?php foreach ($items as $item): ?>
                <?php $hasChildren = !empty($item['items']); ?>
                <div class="kt-menu-item<?= !empty($item['active']) ? ' active' : '' ?>"
                     <?php if ($hasChildren): ?>
                         data-kt-menu-item-offset="0, 10px"
                         data-kt-menu-item-placement="bottom-start"
                         data-kt-menu-item-toggle="dropdown"
                         data-kt-menu-item-trigger="click|lg:hover"
                     <?php endif; ?>>
                    <?php if ($hasChildren): ?>
                        <button class="kt-menu-link">
                            <?php if (!empty($item['icon'])): ?>
                                <span class="kt-menu-icon"><i class="<?= Html::encode($item['icon']) ?>"></i></span>
                            <?php endif; ?>
                            <span class="kt-menu-title"><?= Html::encode($item['label'] ?? '') ?></span>
                            <span class="kt-menu-arrow"><i class="ki-filled ki-down"></i></span>
                        </button>
                        <div class="kt-menu-dropdown py-2 min-w-[200px]">
                            <?php foreach ($item['items'] as $sub): ?>
                                <div class="kt-menu-item<?= !empty($sub['active']) ? ' active' : '' ?>">
                                    <a class="kt-menu-link" href="<?= Html::encode(Url::to($sub['url'] ?? '#')) ?>">
                                        <?php if (!empty($sub['icon'])): ?>
                                            <span class="kt-menu-icon"><i class="<?= Html::encode($sub['icon']) ?>"></i></span>
                                        <?php endif; ?>
                                        <span class="kt-menu-title"><?= Html::encode($sub['label'] ?? '') ?></span>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <a class="kt-menu-link" href="<?= Html::encode(Url::to($item['url'] ?? '#')) ?>">
                            <?php if (!empty($item['icon'])): ?>
                                <span class="kt-menu-icon"><i class="<?= Html::encode($item['icon']) ?>"></i></span>
                            <?php endif; ?>
                            <span class="kt-menu-title"><?= Html::encode($item['label'] ?? '') ?></span>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
