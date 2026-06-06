<?php

declare(strict_types=1);

/**
 * @var array $item
 * @var string $avatarSize
 * @var bool $bordered
 */

use carono\metronic\widgets\Avatar;
use yii\helpers\Html;
use yii\helpers\Url;

$title = (string)($item['title'] ?? '');
$subtitle = $item['subtitle'] ?? null;
$avatar = $item['avatar'] ?? null;
$icon = $item['icon'] ?? null;
$url = $item['url'] ?? null;
$action = $item['action'] ?? null;
$active = !empty($item['active']);

$rowClass = 'flex items-center justify-between gap-2.5 py-3.5'
    . ($bordered ? ' not-last:border-b border-input' : '')
    . ($active ? ' bg-accent/30 rounded-md px-2.5' : '');
?>
<div class="<?= $rowClass ?>">
    <div class="flex items-center gap-2.5 min-w-0">
        <?php if ($avatar !== null): ?>
            <?= Avatar::widget(['src' => $avatar, 'size' => $avatarSize]) ?>
        <?php elseif ($icon !== null): ?>
            <span class="flex items-center justify-center kt-avatar <?= Html::encode($avatarSize) ?> rounded-full bg-accent">
                <i class="<?= Html::encode($icon) ?> text-muted-foreground"></i>
            </span>
        <?php endif; ?>
        <div class="flex flex-col justify-center gap-1.5 min-w-0">
            <?php if ($url !== null): ?>
                <a class="leading-none font-medium text-sm text-mono hover:text-primary truncate"
                   href="<?= Html::encode(Url::to($url)) ?>"><?= Html::encode($title) ?></a>
            <?php else: ?>
                <span class="leading-none font-medium text-sm text-mono truncate"><?= Html::encode($title) ?></span>
            <?php endif; ?>
            <?php if ($subtitle !== null): ?>
                <span class="text-sm text-secondary-foreground"><?= Html::encode($subtitle) ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php if ($action !== null): ?>
        <div class="flex items-center gap-2.5 shrink-0"><?= $action ?></div>
    <?php endif; ?>
</div>
