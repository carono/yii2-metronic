<?php

declare(strict_types=1);

/**
 * @var \yii\web\View $this
 * @var array $options
 * @var array $bodyOptions
 * @var array $headerOptions
 * @var ?string $title
 * @var ?string $subtitle
 * @var ?string $icon
 * @var ?string $toolbar
 * @var array $menu
 * @var string $menuIcon
 * @var string $menuDropdownWidth
 * @var ?string $headerBackground
 * @var bool $hasHeader
 */

use yii\helpers\Html;

?>
<?= Html::beginTag('div', $options) ?>
    <?php if ($hasHeader): ?>
        <?= $this->render('card-header', [
            'headerOptions' => $headerOptions,
            'title' => $title,
            'subtitle' => $subtitle,
            'icon' => $icon,
            'toolbar' => $toolbar,
            'menu' => $menu,
            'menuIcon' => $menuIcon,
            'menuDropdownWidth' => $menuDropdownWidth,
            'headerBackground' => $headerBackground,
        ]) ?>
    <?php endif; ?>
    <?= Html::beginTag('div', $bodyOptions) ?>
