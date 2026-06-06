<?php

declare(strict_types=1);

/**
 * @var array $items
 * @var array $tabsOptions
 * @var array $contentOptions
 * @var array $options
 * @var string $idPrefix
 */

use yii\helpers\Html;

?>
<?= Html::beginTag('div', $options) ?>
    <?= Html::beginTag('div', $tabsOptions) ?>
        <?php foreach ($items as $i => $item):
            $tabId = $idPrefix . '_tab_' . $i;
            $classes = 'kt-tab-toggle' . (!empty($item['active']) ? ' active' : '');
        ?>
            <button type="button" class="<?= $classes ?>" data-kt-tab-toggle="#<?= $tabId ?>"><?= Html::encode($item['label'] ?? '') ?></button>
        <?php endforeach; ?>
    <?= Html::endTag('div') ?>

    <?= Html::beginTag('div', $contentOptions) ?>
        <?php foreach ($items as $i => $item):
            $tabId = $idPrefix . '_tab_' . $i;
            $hidden = empty($item['active']) ? ' hidden' : '';
        ?>
            <div class="kt-tab-pane<?= $hidden ?>" id="<?= $tabId ?>"><?= $item['content'] ?? '' ?></div>
        <?php endforeach; ?>
    <?= Html::endTag('div') ?>
<?= Html::endTag('div') ?>
