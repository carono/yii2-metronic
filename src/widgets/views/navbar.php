<?php

declare(strict_types=1);

/**
 * @var string $id
 * @var array $items
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>
<div class="flex items-stretch lg:fixed z-5 top-(--header-height) start-(--sidebar-width) end-5 h-(--navbar-height) mx-5 lg:mx-0 bg-muted" id="<?= Html::encode($id) ?>">
    <div class="rounded-t-xl border border-input border-b-input bg-background flex items-stretch grow">
        <?php if ($items !== []): ?>
            <div class="kt-container-fluid flex items-center justify-between gap-3">
                <div class="kt-menu kt-menu-default" data-kt-menu="true">
                    <?php foreach ($items as $item): ?>
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
        <?php endif; ?>
    </div>
</div>
