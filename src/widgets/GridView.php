<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\helpers\Html;

/**
 * GridView в стилистике Metronic — заменяет Bootstrap-классы Yii на kt-table-* и kt-input.
 *
 * Использовать так же, как стандартный `\yii\grid\GridView`:
 *
 * ```php
 * <?= GridView::widget([
 *     'dataProvider' => $dataProvider,
 *     'filterModel' => $searchModel,
 *     'columns' => [
 *         ['class' => SerialColumn::class],
 *         'id',
 *         'name',
 *         ['class' => ActionColumn::class],
 *     ],
 * ]) ?>
 * ```
 *
 * Чтобы получить таблицу в обёртке Card с тулбаром — используйте `Card::begin(['variant' => 'grid', ...])`.
 */
class GridView extends \yii\grid\GridView
{
    public $tableOptions = ['class' => 'kt-table kt-table-border table-auto'];

    public $layout = "{items}\n<div class=\"flex items-center justify-between p-4 border-t border-input\">\n  <div>{summary}</div>\n  <div>{pager}</div>\n</div>";

    public $summary = '<span class="text-xs text-muted-foreground">Показано {begin}–{end} из {totalCount}</span>';

    public $emptyText = 'Нет данных';

    public $emptyTextOptions = ['class' => 'p-4 text-center text-sm text-muted-foreground'];

    public $pager = [
        'class' => MetronicLinkPager::class,
    ];

    public $filterRowOptions = ['class' => 'kt-filter-row'];

    public function init()
    {
        parent::init();
        Html::addCssClass($this->options, 'kt-scrollable-x-auto');
    }
}
