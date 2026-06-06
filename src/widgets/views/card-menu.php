<?php

declare(strict_types=1);

/**
 * @var array $menu
 * @var string $menuIcon
 * @var string $menuDropdownWidth
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="kt-menu" data-kt-menu="true">
    <div class="kt-menu-item"
         data-kt-menu-item-offset="0, 10px"
         data-kt-menu-item-placement="bottom-end"
         data-kt-menu-item-toggle="dropdown"
         data-kt-menu-item-trigger="click">
        <button class="kt-menu-toggle kt-btn kt-btn-icon kt-btn-ghost" type="button">
            <i class="<?= Html::encode($menuIcon) ?> text-lg"></i>
        </button>
        <div class="kt-menu-dropdown kt-menu-default <?= Html::encode($menuDropdownWidth) ?> py-2">
            <?php foreach ($menu as $item): ?>
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
