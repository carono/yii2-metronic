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
        'data-kt-modal-toggle' => '#' . $options['id'],
    ]) ?>
<?php endif; ?>
<?= Html::beginTag('div', $options) ?>
    <div class="kt-modal-content max-w-[600px] top-[15%]">
        <div class="kt-modal-header">
            <?php if ($title !== null): ?>
                <h3 class="kt-modal-title"><?= Html::encode($title) ?></h3>
            <?php endif; ?>
            <button class="kt-btn kt-btn-icon kt-btn-ghost" data-kt-modal-dismiss="true" type="button"><i class="ki-filled ki-cross"></i></button>
        </div>
        <div class="kt-modal-body">
