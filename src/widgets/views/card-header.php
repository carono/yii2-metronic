<?php

declare(strict_types=1);

/**
 * @var \yii\web\View $this
 * @var array $headerOptions
 * @var ?string $title
 * @var ?string $subtitle
 * @var ?string $icon
 * @var ?string $toolbar
 * @var array $menu
 * @var string $menuIcon
 * @var string $menuDropdownWidth
 * @var ?string $headerBackground
 */

use yii\helpers\Html;

if ($headerBackground !== null) {
    Html::addCssClass($headerOptions, 'kt-card-rounded-t flex justify-end items-start relative p-0 bg-no-repeat bg-cover bg-center h-[120px]');
    $headerOptions['style'] = ($headerOptions['style'] ?? '')
        . 'background-image: url(' . Html::encode($headerBackground) . ');';
}
?>
<?= Html::beginTag('div', $headerOptions) ?>
    <?php if ($title !== null || $icon !== null || $subtitle !== null): ?>
        <div class="flex items-center gap-2.5">
            <?php if ($icon !== null): ?>
                <i class="<?= Html::encode($icon) ?> text-lg text-muted-foreground"></i>
            <?php endif; ?>
            <?php if ($title !== null || $subtitle !== null): ?>
                <div class="flex flex-col">
                    <?php if ($title !== null): ?>
                        <h3 class="kt-card-title"><?= Html::encode($title) ?></h3>
                    <?php endif; ?>
                    <?php if ($subtitle !== null): ?>
                        <span class="text-xs text-muted-foreground"><?= Html::encode($subtitle) ?></span>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if ($toolbar !== null || $menu !== []): ?>
        <div class="flex items-center gap-2">
            <?php if ($toolbar !== null): ?>
                <?= $toolbar ?>
            <?php endif; ?>
            <?php if ($menu !== []): ?>
                <?= $this->render('card-menu', [
                    'menu' => $menu,
                    'menuIcon' => $menuIcon,
                    'menuDropdownWidth' => $menuDropdownWidth,
                ]) ?>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?= Html::endTag('div') ?>
