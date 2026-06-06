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

## Установка ассетов Metronic (обязательный шаг)

В репозитории **не лежат** лицензионные файлы Metronic (KTUI, Keenicons, скомпилированный
Tailwind CSS, медиафайлы — всё это интеллектуальная собственность Keenthemes и
распространяется по их лицензии). Их нужно распаковать вручную в `vendor/carono/yii2-metronic/src/web/`
из официальной поставки.

1. Купите/получите Metronic v9 (Tailwind) на [keenthemes.com](https://keenthemes.com/metronic/).
2. В архиве найдите папку `dist/assets/` (или `demo3/assets/` / `demo9/assets/` — содержимое
   одинаковое для тех файлов, что нужны пакету).
3. Скопируйте в `vendor/carono/yii2-metronic/src/web/` следующее:

   ```text
   src/web/
   ├── css/
   │   ├── core.bundle.css        ← assets/css/core.bundle.css
   │   └── styles.css             ← assets/css/styles.css
   ├── js/
   │   ├── core.bundle.js         ← assets/js/core.bundle.js
   │   ├── widgets/               ← assets/js/widgets/  (general.js, calendar.js, …)
   │   └── layouts/               ← assets/js/layouts/  (demo1.js, …)
   ├── vendors/
   │   ├── ktui/
   │   │   └── ktui.min.js        ← assets/vendors/ktui/ktui.min.js
   │   └── keenicons/
   │       ├── styles.bundle.css  ← assets/vendors/keenicons/styles.bundle.css
   │       └── fonts/             ← assets/vendors/keenicons/fonts/
   └── media/
       ├── app/                   ← assets/media/app/         (логотипы, favicon)
       ├── avatars/               ← assets/media/avatars/     (если используете Avatar)
       ├── brand-logos/           ← assets/media/brand-logos/
       ├── flags/                 ← assets/media/flags/
       ├── illustrations/         ← assets/media/illustrations/
       └── file-types/            ← assets/media/file-types/
   ```

4. Сбросьте кэш опубликованных ассетов вашего приложения, чтобы Yii AssetManager
   переопубликовал содержимое:

   ```bash
   rm -rf web/assets/*
   ```

Файлы пакета (`composer update`/`composer install`) ассеты не перезатирает —
они остаются нетронутыми после распаковки.

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
