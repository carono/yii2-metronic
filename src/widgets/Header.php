<?php

declare(strict_types=1);

namespace carono\metronic\widgets;

use Yii;
use carono\metronic\assets\MetronicAsset;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Шапка приложения для обоих layout-ов Metronic.
 *
 * Поведение зависит от `$layout`:
 *  - 'demo3' — фиксированная узкая шапка 58px с логотипом и dropdown «Account».
 *  - 'demo9' — sticky-шапка 78px с расширенной навигацией.
 *
 * Основная задача виджета — отрисовать каркас. Конкретные пункты меню (account-dropdown,
 * notifications, user-menu) приложение пробрасывает через свойства, либо переопределяет вьюху.
 */
class Header extends Widget
{
    public string $layout = 'demo3';

    /** @var string Текст бренда в шапке. */
    public string $brand = 'Metronic';

    /** @var string|null URL логотипа (light). */
    public ?string $logoLight = null;

    /** @var string|null URL логотипа (dark). */
    public ?string $logoDark = null;

    /** @var string URL главной страницы. */
    public string $homeUrl = '/';

    /** @var array Пункты выпадающего меню «Account» (для demo3). Формат: [['label','url','icon','active'?]]. */
    public array $accountMenu = [];

    /** @var array Пункты пользовательского меню (правый край шапки). */
    public array $userMenu = [];

    public function init(): void
    {
        parent::init();
        $baseUrl = MetronicAsset::register($this->view)->baseUrl;
        if ($this->logoLight === null) {
            $this->logoLight = $baseUrl . '/media/app/mini-logo-primary.svg';
        }
        if ($this->logoDark === null) {
            $this->logoDark = $baseUrl . '/media/app/mini-logo-primary-dark.svg';
        }
    }

    public function run(): string
    {
        return $this->render($this->layout === 'demo9' ? 'header-demo9' : 'header-demo3', [
            'brand' => $this->brand,
            'logoLight' => $this->logoLight,
            'logoDark' => $this->logoDark,
            'homeUrl' => $this->homeUrl,
            'accountMenu' => $this->accountMenu,
            'userMenu' => $this->userMenu,
        ]);
    }
}
