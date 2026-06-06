<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Хлебные крошки в стиле Metronic — простой ряд ссылок с разделителем "/".
 *
 * Совместим по интерфейсу с \yii\widgets\Breadcrumbs: использует свойства `homeLink`, `links`.
 */
class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public $tag = 'div';

    public $options = [
        'class' => 'flex items-center gap-1 text-sm font-normal',
    ];

    public $itemTemplate = "<span class=\"text-secondary-foreground\">{link}</span>\n";

    public $activeItemTemplate = "<span class=\"text-mono\">{link}</span>\n";

    /** @var string|null Текст разделителя между пунктами. */
    public ?string $separator = '/';

    public function run()
    {
        if (empty($this->links)) {
            return;
        }
        $links = [];
        if ($this->homeLink === null) {
            $links[] = $this->renderItem([
                'label' => \Yii::t('yii', 'Home'),
                'url' => \Yii::$app->homeUrl,
            ], $this->itemTemplate);
        } elseif ($this->homeLink !== false) {
            $links[] = $this->renderItem($this->homeLink, $this->itemTemplate);
        }
        foreach ($this->links as $link) {
            if (!is_array($link)) {
                $link = ['label' => $link];
            }
            $links[] = $this->renderItem($link, isset($link['url']) ? $this->itemTemplate : $this->activeItemTemplate);
        }
        $sep = '<span class="text-muted-foreground">' . Html::encode($this->separator ?? '') . '</span>';
        echo Html::tag($this->tag, implode($sep, $links), $this->options);
    }
}
