<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use yii\helpers\Html;

/**
 * Пагинатор в стилистике Metronic — кнопки kt-btn вместо list-group.
 */
class MetronicLinkPager extends \yii\widgets\LinkPager
{
    public $options = ['class' => 'flex items-center gap-1', 'tag' => 'nav'];

    public $linkContainerOptions = ['tag' => 'span'];

    public $linkOptions = ['class' => 'kt-btn kt-btn-sm kt-btn-outline'];

    public $disabledListItemSubTagOptions = ['tag' => 'span', 'class' => 'kt-btn kt-btn-sm kt-btn-ghost text-muted-foreground cursor-not-allowed'];

    public $disabledPageCssClass = 'opacity-50 pointer-events-none';

    public $activePageCssClass = '';

    public $firstPageCssClass = '';

    public $lastPageCssClass = '';

    public $prevPageCssClass = '';

    public $nextPageCssClass = '';

    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $linkOptions = $this->linkOptions;
        Html::addCssClass($linkOptions, $class);
        if ($active) {
            Html::addCssClass($linkOptions, 'kt-btn-primary');
            $linkOptions['class'] = str_replace('kt-btn-outline', '', $linkOptions['class']);
        }
        if ($disabled) {
            Html::addCssClass($linkOptions, $this->disabledPageCssClass);
            $linkOptions['tabindex'] = '-1';
        }
        $linkOptions['data-page'] = $page;
        return Html::a($label, $this->pagination->createUrl($page), $linkOptions);
    }
}
