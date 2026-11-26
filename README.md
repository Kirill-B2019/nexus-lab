# ЛАБОРАТОРИЯ НЕКСУС — ОСНОВАНИЕ · Laravel 12

Цифровая лаборатория полного стека: среда, где архитектура, код, финансы и право
соединяются в единый исследовательский и проектный контур.

Лендинг переписан с Next.js на **Laravel 12** (PHP 8.2+, Blade, Tailwind CSS v4, Vite).
Дизайн-система перенесена один-в-один с референса nexus-invest.fund:

- Гамма: `#0E0E0E` (ink), `#191919` (charcoal), `#ECEEF2` (mist), `#C5FF41` (lime),
  `#3B4725` (olive), `#52B8AA` (teal), `#967DFF` (purple)
- Шрифты: **Urbanist** (дисплей) + **Manrope** (тело) — подключаются через Google Fonts
- Стилистика: редакционно-бруталистская, uppercase-лейблы, тёмный hero + светлые секции

> Пакет нельзя запустить в текущей песочнице (нет PHP). Этот каталог — исходники,
> готовые к запуску на любом сервере с PHP 8.2+ и Composer.

---

## Требования

- PHP **8.2+** (расширения: mbstring, openssl, pdo, tokenizer, xml, ctype, json, bcmath, fileinfo, curl)
- **Composer** 2.7+
- **Node.js** 18+ и **npm** (только для сборки ассетов через Vite)

---

## Установка

```bash
# 1. Перейти в каталог проекта
cd nexus-lab-laravel

# 2. Установить PHP-зависимости
composer install --no-dev --optimize-autoloader

# 3. Скопировать .env и сгенерировать ключ
cp .env.example .env
php artisan key:generate

# 4. Установить JS-зависимости и собрать ассеты
npm install
npm run build      # продакшн-сборка CSS в public/build
# либо для разработки с хот-релоудом:
npm run dev        # запускает Vite-сервер, не закрывайте терминал
```

## Запуск

```bash
php artisan serve --port=8000
```

Откройте http://localhost:8000 — лендинг «ЛАБОРАТОРИЯ НЕКСУС» готов.

В режиме разработки CSS обслуживается Vite (порт 5173); Blade-шаблон подключает его
через директиву `@vite`. В продакшне `npm run build` собирает ассеты в `public/build`,
и `@vite` отдаёт скомпилированный CSS.

---

## Структура

```
nexus-lab-laravel/
├── app/Http/
│   ├── Controllers/
│   │   ├── Controller.php          # базовый абстрактный контроллер
│   │   ├── LabController.php       # GET /  → view('home')
│   │   └── ContactController.php   # POST /api/contact (валидация + JSON-ответ)
│   └── Requests/
│       └── ContactRequest.php      # правила валидации заявки
├── bootstrap/app.php               # конфигурация приложения (Laravel 11+ стиль)
├── config/
│   ├── app.php                     # базовые настройки
│   └── lab.php                     # КОНТЕНТ лендинга (все секции и данные)
├── public/
│   ├── index.php                   # фронт-контроллер
│   └── .htaccess                   # Apache rewrite
├── resources/
│   ├── css/app.css                 # Tailwind v4 + Nexus theme tokens
│   └── views/
│       ├── layouts/app.blade.php   # HTML-каркас, шрифты, Vite, header/footer, тосты
│       ├── home.blade.php          # композиция всех секций
│       └── partials/               # 14 секций:
│           ├── header.blade.php    ├── hero.blade.php        ├── marquee.blade.php
│           ├── mission.blade.php   ├── principles.blade.php  ├── modules.blade.php
│           ├── services.blade.php  ├── audience.blade.php    ├── business-model.blade.php
│           ├── tech-stack.blade.php├── roadmap.blade.php     ├── metrics.blade.php
│           ├── risks.blade.php     ├── cta.blade.php         └── footer.blade.php
├── routes/
│   ├── web.php                     # маршруты: GET / и POST/GET /api/contact
│   └── console.php
├── artisan                         # CLI-точка входа
├── composer.json
├── package.json                    # Vite + Tailwind v4
├── vite.config.js
└── .env.example
```

## Секции лендинга

1. Hero (тёмный ink, лайм-акцент, 4 дисциплины)
2. Бегущая строка терминов
3. Миссия и позиционирование
4. 5 ключевых принципов
5. 5 модулей лаборатории (карточки + таблица)
6. 6 форматов работы (сервисы)
7. 4 сегмента аудитории
8. 3 потока дохода (с прогресс-барами)
9. Технологический стек (послойная диаграмма + поток данных)
10. Дорожная карта — 3 этапа
11. 6 метрик успеха
12. 3 риска и их снижение
13. CTA с рабочей формой заявки → `POST /api/contact`
14. Footer (прижат к низу через `min-h-screen flex flex-col` + `mt-auto`)

## API заявки

`POST /api/contact` — принимает JSON `{ name, email, project, message }`,
валидирует через `ContactRequest`, возвращает `{ ok, ticket, received_at, summary }`
с HTTP 201. В продакшне здесь должна быть запись в БД / отправка в CRM.

## Кастомизация контента

Весь текстовый контент вынесен в **`config/lab.php`** — меняйте данные там,
шаблоны подтянут автоматически через `config('lab.<section>.<key>')`.

## Лицензия

MIT. Контент носит информационный характер и не является публичной офертой.
