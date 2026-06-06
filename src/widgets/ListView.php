<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use Closure;

/**
 * Metronic-список с DataProvider и пагинацией. Наследник `\yii\widgets\ListView` со своим
 * itemView по умолчанию — для каждого элемента рендерит «flex-строку Block List».
 *
 * Дефолтная разметка строки берётся из view `widgets/views/item-list-row.php`. Чтобы
 * подменить разметку — задайте `$itemView` (стандартный механизм Yii ListView) и работайте
 * с моделью напрямую. Чтобы остаться на дефолтной разметке, но подменить набор полей —
 * задайте `$itemMap` (Closure: $model → ['avatar','title','subtitle','url','action']).
 *
 * ```php
 * <?= ListView::widget([
 *     'dataProvider' => $dp,
 *     'itemMap' => fn($u) => [
 *         'avatar' => $u['avatar'],
 *         'title' => $u['name'],
 *         'subtitle' => $u['email'],
 *         'action' => Btn::icon(['variant' => 'ghost', 'icon' => 'ki-filled ki-trash']),
 *     ],
 * ]) ?>
 * ```
 */
class ListView extends \yii\widgets\ListView
{
    public $options = ['class' => 'flex flex-col'];

    /** @var Closure|null Преобразует элемент DataProvider в массив для дефолтной строки. */
    public ?Closure $itemMap = null;

    /** @var string Размер аватарки. */
    public string $avatarSize = 'size-9';

    /** @var bool Разделитель между строками. */
    public bool $bordered = true;

    /** @var string View-файл одной строки (если $itemView не задан). */
    public string $defaultItemView = 'item-list-row';

    public $layout = "{items}\n<div class=\"flex items-center justify-between pt-4 border-t border-input mt-4\">\n  <div>{summary}</div>\n  <div>{pager}</div>\n</div>";

    public $summary = '<span class="text-xs text-muted-foreground">Показано {begin}–{end} из {totalCount}</span>';

    public $emptyText = 'Нет данных';

    public $emptyTextOptions = ['class' => 'p-4 text-center text-sm text-muted-foreground'];

    public $pager = [
        'class' => MetronicLinkPager::class,
    ];

    public function renderItem($model, $key, $index)
    {
        if ($this->itemView !== null) {
            return parent::renderItem($model, $key, $index);
        }

        $data = $this->itemMap !== null
            ? ($this->itemMap)($model, $key, $index)
            : $this->defaultItemMap($model);

        return $this->getView()->renderFile(
            __DIR__ . '/views/' . $this->defaultItemView . '.php',
            [
                'item' => $data,
                'avatarSize' => $this->avatarSize,
                'bordered' => $this->bordered,
            ],
            $this
        );
    }

    private function defaultItemMap(mixed $model): array
    {
        $get = static function (mixed $m, string $key) {
            if (is_array($m)) {
                return $m[$key] ?? null;
            }
            return is_object($m) && isset($m->$key) ? $m->$key : null;
        };

        return [
            'avatar' => $get($model, 'avatar'),
            'icon' => $get($model, 'icon'),
            'title' => (string)($get($model, 'title') ?? $get($model, 'name') ?? ''),
            'subtitle' => $get($model, 'subtitle') ?? $get($model, 'meta'),
            'url' => $get($model, 'url'),
            'action' => $get($model, 'action'),
        ];
    }
}
