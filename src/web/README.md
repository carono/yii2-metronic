# Куда распаковать ассеты Metronic

Распакуйте в эту папку **содержимое** `demo3/assets/` (или `demo9/assets/` — оно одинаковое)
из официальной поставки Keenthemes как `metronic/`, чтобы получить структуру:

```
src/web/
└── metronic/
    ├── css/
    │   ├── core.bundle.css
    │   └── styles.css
    ├── js/
    │   ├── core.bundle.js
    │   ├── layouts/
    │   └── widgets/
    ├── media/
    │   ├── app/
    │   ├── avatars/
    │   └── …
    └── vendors/
        ├── keenicons/
        │   ├── styles.bundle.css
        │   └── fonts/
        └── ktui/
            └── ktui.min.js
```

То есть достаточно одной команды:

```bash
unzip metronic-v9-html.zip
cp -r metronic-tailwind-html/demo3/assets src/web/metronic
```

или (если ставите в `vendor/`):

```bash
cp -r metronic-tailwind-html/demo3/assets vendor/carono/yii2-metronic/src/web/metronic
```

После этого `composer dump-autoload` не нужен — `AssetManager` сам опубликует
файлы при первом запросе. Если ассеты уже были опубликованы — сбросьте кэш:

```bash
rm -rf web/assets/*
```
