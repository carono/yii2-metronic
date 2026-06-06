<?php

declare(strict_types=1);

/**
 * @var ?string $src
 * @var string $initials
 * @var ?string $status
 * @var array $options
 */

use yii\helpers\Html;

?>
<?= Html::beginTag('div', $options) ?>
    <?php if ($src !== null): ?>
        <div class="kt-avatar-image">
            <?= Html::img($src, ['alt' => $initials]) ?>
        </div>
    <?php else: ?>
        <div class="kt-avatar-fallback font-medium text-mono"><?= Html::encode($initials) ?></div>
    <?php endif; ?>
    <?php if ($status !== null): ?>
        <span class="kt-avatar-status kt-avatar-status-<?= Html::encode($status) ?> absolute bottom-0 end-0"></span>
    <?php endif; ?>
<?= Html::endTag('div') ?>
