<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\helpers\Html;

/**
 * DetailView в стилистике Metronic — пары "label → value" в виде двухколоночной таблицы
 * с классами kt-table. Совместим по API с `\yii\widgets\DetailView`.
 *
 * ```php
 * <?= DetailView::widget([
 *     'model' => $model,
 *     'attributes' => ['id', 'name', 'email:email', 'created_at:datetime'],
 * ]) ?>
 * ```
 */
class DetailView extends \yii\widgets\DetailView
{
    public $options = ['class' => 'kt-table kt-table-border w-full', 'tag' => 'table'];

    public $template = '<tr><th class="px-4 py-3 w-1/3 text-start text-secondary-foreground font-medium align-middle">{label}</th><td class="text-mono align-middle">{value}</td></tr>';
}
