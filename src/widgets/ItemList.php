<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\base\Widget;

/**
 * Универсальный список-строк в стилистике Metronic. Покрывает паттерны "Block List",
 * "Manage your Data", "Settings list" и т.п.
 *
 * Каждый item — flex-строка с двумя зонами: контент слева (avatar/icon + title + subtitle),
 * action справа (произвольный HTML).
 *
 * ```php
 * <?= ItemList::widget([
 *     'items' => [
 *         [
 *             'avatar' => Media::url('avatars/300-1.png'),
 *             'title' => 'Esther Howard',
 *             'subtitle' => '6 commits',
 *             'action' => Btn::icon(['variant' => 'ghost', 'icon' => 'ki-filled ki-trash']),
 *         ],
 *     ],
 * ]) ?>
 * ```
 */
class ItemList extends Widget
{
    /**
     * @var array Список элементов. Поля каждого:
     *   - 'avatar' | 'icon' — медиа слева
     *   - 'title'  — заголовок (string)
     *   - 'subtitle' — подпись (string)
     *   - 'url'    — title станет ссылкой
     *   - 'action' — произвольный HTML справа
     *   - 'active' — bool, подсветка строки
     */
    public array $items = [];

    /** @var string Размер аватарки (Tailwind size-*). */
    public string $avatarSize = 'size-9';

    /** @var bool Разделитель между строками. */
    public bool $bordered = true;

    /** @var array Опции корневого контейнера. */
    public array $options = ['class' => 'flex flex-col'];

    /** @var string Имя view-файла со списком. */
    public string $viewName = 'item-list';

    /** @var string Имя view-файла одной строки. */
    public string $itemViewName = 'item-list-row';

    public function run(): string
    {
        return $this->render($this->viewName, [
            'items' => $this->items,
            'options' => $this->options,
            'avatarSize' => $this->avatarSize,
            'bordered' => $this->bordered,
            'itemViewName' => $this->itemViewName,
        ]);
    }
}
