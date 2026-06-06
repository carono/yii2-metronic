<?php

declare(strict_types=1);

/**
 * @var array $options
 * @var ?string $title
 * @var ?array $toggleButton
 */

use yii\helpers\Html;

?>
<?php if ($toggleButton !== null): ?>
    <?= Html::tag('button', Html::encode($toggleButton['label'] ?? 'Open'), [
        'type' => 'button',
        'class' => $toggleButton['class'] ?? 'kt-btn kt-btn-primary',
        'data-kt-drawer-toggle' => '#' . $options['id'],
    ]) ?>
<?php endif; ?>
<?= Html::beginTag('div', $options) ?>
    <?php if ($title !== null): ?>
        <div class="kt-drawer-header">
            <h3 class="kt-drawer-title"><?= Html::encode($title) ?></h3>
            <button class="kt-btn kt-btn-icon kt-btn-ghost" data-kt-drawer-dismiss="true" type="button"><i class="ki-filled ki-cross"></i></button>
        </div>
    <?php endif; ?>
    <div class="kt-drawer-body">
