<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Лаборатория НЕКСУС') }} — {{ config('lab.tagline') }}</title>
    <meta name="description" content="Цифровая лаборатория НЕКСУС: среда, где архитектура, код, финансы и право соединяются в единый исследовательский и проектный контур.">

    {{-- Google Fonts: Manrope (body) + Urbanist (display) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Urbanist:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite: dev server or compiled assets --}}
    @vite(['resources/css/app.css'])
</head>
<body class="font-body antialiased bg-nexus-mist text-nexus-charcoal">
<div class="flex min-h-screen flex-col">
    @include('partials.header')

    <main class="flex-1">
        @yield('body')
    </main>

    @include('partials.footer')
</div>

{{-- Toast container (mirrors the Next.js UI) --}}
<div id="toast-root" class="pointer-events-none fixed inset-x-0 bottom-6 z-[100] flex flex-col items-center gap-2 px-4"></div>

<script>
    // Lightweight toast + contact form handler (no build step required at runtime)
    window.NEXUS = {
        csrf: '{{ csrf_token() }}',
        contactEndpoint: '{{ route("contact.store") }}',
    };

    window.nexusToast = function (title, description, variant) {
        var root = document.getElementById('toast-root');
        if (!root) return;
        var el = document.createElement('div');
        el.className = 'pointer-events-auto w-full max-w-md rounded-xl border px-5 py-4 shadow-lg backdrop-blur ' +
            (variant === 'destructive'
                ? 'border-red-500/30 bg-red-950/90 text-red-50'
                : 'border-nexus-lime/30 bg-nexus-charcoal/95 text-nexus-mist');
        el.innerHTML = '<div class="font-display text-sm font-semibold uppercase tracking-wide">' +
            (variant === 'destructive' ? 'Ошибка' : title) + '</div>' +
            '<div class="mt-1 text-xs text-nexus-muted-3">' + (description || '') + '</div>';
        root.appendChild(el);
        setTimeout(function () { el.style.transition = 'opacity .4s'; el.style.opacity = '0'; setTimeout(function(){ el.remove(); }, 400); }, 4200);
    };

    document.addEventListener('submit', function (e) {
        var form = e.target;
        if (!form || form.dataset.nexus !== 'contact') return;
        e.preventDefault();
        var btn = form.querySelector('[data-nexus-submit]');
        var labelIdle = btn ? btn.getAttribute('data-idle') : 'Отправить';
        var labelLoading = btn ? btn.getAttribute('data-loading') : 'Отправляем…';
        if (btn) { btn.disabled = true; btn.dataset.state = 'loading'; btn.textContent = labelLoading; }

        fetch(window.NEXUS.contactEndpoint, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': window.NEXUS.csrf,
            },
            body: JSON.stringify(Object.fromEntries(new FormData(form).entries())),
        }).then(function (r) { return r.json().then(function (j) { return { ok: r.ok, json: j }; }); })
          .then(function (res) {
              if (res.ok) {
                  if (btn) { btn.dataset.state = 'done'; btn.textContent = 'Заявка принята'; }
                  window.nexusToast('Заявка принята', 'Команда лаборатории свяжется с вами в течение рабочего дня.');
                  form.reset();
                  setTimeout(function () { if (btn) { btn.disabled = false; btn.dataset.state = 'idle'; btn.textContent = labelIdle; } }, 4000);
              } else {
                  if (btn) { btn.disabled = false; btn.dataset.state = 'idle'; btn.textContent = labelIdle; }
                  var msg = (res.json && res.json.message) ? res.json.message : 'Проверьте поля формы.';
                  window.nexusToast('Не удалось отправить', msg, 'destructive');
              }
          }).catch(function () {
              if (btn) { btn.disabled = false; btn.dataset.state = 'idle'; btn.textContent = labelIdle; }
              window.nexusToast('Не удалось отправить', 'Сеть недоступна. Попробуйте позже.', 'destructive');
          });
    });

    // Sticky header background on scroll
    (function () {
        var header = document.querySelector('[data-nexus-header]');
        if (!header) return;
        var onScroll = function () {
            if (window.scrollY > 12) header.classList.add('is-scrolled');
            else header.classList.remove('is-scrolled');
        };
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });
    })();
</script>

<style>
    [data-nexus-header] { transition: background-color .3s, border-color .3s, backdrop-filter .3s; }
    [data-nexus-header].is-scrolled {
        background-color: rgba(236, 238, 242, 0.85);
        backdrop-filter: blur(12px);
        border-bottom-color: rgba(14, 14, 14, 0.10);
    }
</style>
</body>
</html>
