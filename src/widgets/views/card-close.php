<?php

declare(strict_types=1);

/**
 * @var ?string $footer
 * @var array $footerOptions
 */

use yii\helpers\Html;

?>
<?= Html::endTag('div') ?><?php // /kt-card-content ?>
<?php if ($footer !== null): ?>
    <?= Html::tag('div', $footer, $footerOptions) ?>
<?php endif; ?>
<?= Html::endTag('div') ?><?php // /kt-card ?>
