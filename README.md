# carono/yii2-metronic

Metronic v9 (Tailwind CSS) admin theme для Yii2. Пакет даёт два layout-а
(demo3 — sidebar, demo9 — sticky topnav), готовые виджеты в стилистике
KTUI и опубликованные через AssetBundle ассеты Metronic.

## Установка

```bash
composer require carono/yii2-metronic
```

Для тяжёлых vendor-зависимостей (apexcharts, jquery и т.п.) пакет использует
[asset-packagist](https://asset-packagist.org). Подключение через `carono/yii2-bower-asset`
происходит автоматически.

## Layouts

Подключаются как layout-файл в контроллере / приложении:

```php
public $layout = '@vendor/carono/yii2-metronic/src/views/layouts/demo3';
// или
public $layout = '@vendor/carono/yii2-metronic/src/views/layouts/demo9';
```

Параметры меню/бренда — через `Yii::$app->params`:

```php
'metronic.brand'       => 'My App',
'metronic.sidebar'     => [['label' => 'Dashboard', 'icon' => 'ki-filled ki-chart-line-star', 'url' => ['site/index']], ...],
'metronic.navbar'      => [...],
'metronic.topnav'      => [...],
'metronic.userMenu'    => [...],
'metronic.accountMenu' => [...],
'metronic.footerLinks' => [...],
```

## Виджеты

`carono\metronic\widgets\`:
- **Layout-составляющие** — `Header`, `Sidebar`, `Navbar`, `TopNav`, `Footer`, `Menu`, `Breadcrumbs`
- **Контейнеры** — `Card`, `Modal`, `Drawer`, `Tabs`
- **Списки/таблицы** — `GridView`, `ListView`, `ItemList`, `DetailView`, `MetronicLinkPager`
- **Атомы** — `Avatar`, `Badge`, `Alert`, `ActiveForm`, `ActiveField`

`carono\metronic\helpers\`:
- `Btn` — kt-btn хелпер (variant/size/iconOnly)
- `Media` — URL картинок Metronic через AssetBundle

## AssetBundles

`carono\metronic\assets\`:
- `MetronicAsset` — базовый (styles.css, keenicons, core.bundle.js, ktui.min.js, YiiAsset)
- `ApexChartsAsset`, `JqueryAsset`, `ClipboardAsset`, `ConfettiAsset` — npm-vendors через `carono\yii2bower\NpmAsset`
- `GeneralWidgetsAsset` — JS-виджеты главной страницы (карта, графики)

## Готовый skeleton

Если нужен готовый Yii2-проект с этим шаблоном — используйте
[carono/yii2-metronic-basic](https://github.com/carono/yii2-metronic-basic):

```bash
composer create-project carono/yii2-metronic-basic myapp
```

## Лицензия

Шаблон Metronic — проприетарный (см. лицензию Keenthemes).
PHP-обёртки этого пакета — proprietary.
