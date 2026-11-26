@php
    $nav = [
        ['href' => '#concept', 'label' => 'Концепция'],
        ['href' => '#modules', 'label' => 'Модули'],
        ['href' => '#services', 'label' => 'Сервисы'],
        ['href' => '#roadmap', 'label' => 'Дорожная карта'],
        ['href' => '#metrics', 'label' => 'Метрики'],
    ];
@endphp

<header data-nexus-header class="sticky top-0 z-50 w-full border-b border-transparent bg-transparent">
    <div class="mx-auto flex h-16 w-full max-w-[1503px] items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">
        {{-- Brand --}}
        <a href="#top" class="group flex items-center gap-2.5" aria-label="Лаборатория НЕКСУС — на главную">
            <span class="relative inline-flex h-9 w-9 items-center justify-center rounded-lg bg-nexus-ink" aria-hidden="true">
                <span class="absolute inset-0 rounded-lg ring-1 ring-inset ring-nexus-lime/30"></span>
                <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none">
                    <path d="M4 20V4M4 20h16M4 12h10M4 4l8 8M12 4l8 16" stroke="#C5FF41" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>
            <span class="flex flex-col leading-none">
                <span class="font-display text-[15px] font-bold uppercase tracking-[0.18em] text-nexus-ink">{{ config('lab.name') }}</span>
                <span class="font-display text-[9px] font-semibold uppercase tracking-[0.32em] text-nexus-muted">Лаборатория · {{ config('lab.tagline') }}</span>
            </span>
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden items-center gap-1 md:flex" aria-label="Основная навигация">
            @foreach ($nav as $item)
                <a href="{{ $item['href'] }}" class="rounded-md px-3 py-2 text-sm font-medium text-nexus-charcoal/80 transition-colors hover:bg-nexus-ink/5 hover:text-nexus-ink">{{ $item['label'] }}</a>
            @endforeach
        </nav>

        {{-- CTA + mobile toggle --}}
        <div class="flex items-center gap-2">
            <a href="#contact" class="hidden items-center gap-1.5 rounded-lg bg-nexus-lime px-4 py-2.5 font-display text-sm font-semibold uppercase tracking-wide text-nexus-ink transition-colors hover:bg-nexus-lime-hover sm:inline-flex">
                Запросить спринт
                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M7 7h10v10"/></svg>
            </a>
            <button type="button" data-nexus-menu class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-nexus-ink/10 bg-white/60 text-nexus-ink md:hidden" aria-label="Открыть меню" aria-expanded="false">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="4" y1="6" x2="20" y2="6"/><line x1="4" y1="12" x2="20" y2="12"/><line x1="4" y1="18" x2="20" y2="18"/></svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div data-nexus-mobile-menu class="hidden border-t border-nexus-ink/10 bg-nexus-mist/95 backdrop-blur-md md:hidden">
        <nav class="mx-auto flex w-full max-w-[1503px] flex-col px-4 py-3 sm:px-6" aria-label="Мобильная навигация">
            @foreach ($nav as $item)
                <a href="{{ $item['href'] }}" data-nexus-menu-link class="rounded-md px-3 py-3 text-base font-medium text-nexus-charcoal/90 transition-colors hover:bg-nexus-ink/5">{{ $item['label'] }}</a>
            @endforeach
            <a href="#contact" data-nexus-menu-link class="mt-2 inline-flex items-center justify-center gap-1.5 rounded-lg bg-nexus-lime px-4 py-3 font-display text-sm font-semibold uppercase tracking-wide text-nexus-ink">Запросить спринт</a>
        </nav>
    </div>
</header>

<script>
    (function () {
        var btn = document.querySelector('[data-nexus-menu]');
        var menu = document.querySelector('[data-nexus-mobile-menu]');
        if (!btn || !menu) return;
        btn.addEventListener('click', function () {
            var open = menu.classList.toggle('hidden') === false;
            btn.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
        menu.querySelectorAll('[data-nexus-menu-link]').forEach(function (link) {
            link.addEventListener('click', function () { menu.classList.add('hidden'); btn.setAttribute('aria-expanded', 'false'); });
        });
    })();
</script>
