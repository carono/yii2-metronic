<?php

declare(strict_types=1);

/**
 * @var string $copyright
 * @var array $links
 * @var string $layout
 */

use yii\helpers\Html;
use yii\helpers\Url;

$container = $layout === 'demo9' ? 'kt-container-fixed' : 'kt-container-fluid';
?>
<footer class="<?= $layout === 'demo9' ? 'footer' : 'py-3' ?>">
    <div class="<?= $container ?>">
        <div class="flex flex-col md:flex-row justify-center md:justify-between items-center gap-3 <?= $layout === 'demo9' ? 'py-5' : 'py-2' ?>">
            <div class="flex order-2 md:order-1 gap-2 font-normal text-sm">
                <span class="text-muted-foreground"><?= Html::encode($copyright) ?></span>
            </div>
            <?php if ($links !== []): ?>
                <nav class="flex order-1 md:order-2 gap-4 font-normal text-sm text-secondary-foreground">
                    <?php foreach ($links as $link): ?>
                        <a class="hover:text-primary" href="<?= Html::encode(Url::to($link['url'] ?? '#')) ?>"><?= Html::encode($link['label'] ?? '') ?></a>
                    <?php endforeach; ?>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</footer>
