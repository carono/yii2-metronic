<?php

declare(strict_types=1);

/**
 * @var \yii\web\View $this
 * @var array $items
 * @var array $options
 * @var string $avatarSize
 * @var bool $bordered
 * @var string $itemViewName
 */

use yii\helpers\Html;

?>
<?= Html::beginTag('div', $options) ?>
    <?php foreach ($items as $item): ?>
        <?= $this->render($itemViewName, [
            'item' => $item,
            'avatarSize' => $avatarSize,
            'bordered' => $bordered,
        ]) ?>
    <?php endforeach; ?>
<?= Html::endTag('div') ?>
