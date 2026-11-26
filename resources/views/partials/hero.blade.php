@php
    $hero = config('lab.hero');
    $statusBadge = config('lab.status_badge');
    $tagline = config('lab.tagline');
@endphp

<section id="top" class="relative overflow-hidden bg-nexus-ink text-nexus-mist">
    <div class="absolute inset-0 bg-grid-dark" aria-hidden="true"></div>
    <div class="absolute inset-0" aria-hidden="true" style="background: radial-gradient(80% 60% at 70% 0%, rgba(197,255,65,0.18), transparent 60%), radial-gradient(60% 50% at 10% 100%, rgba(82,184,170,0.10), transparent 60%);"></div>

    <div class="relative mx-auto w-full max-w-[1503px] px-4 pt-10 pb-16 sm:px-6 sm:pt-14 sm:pb-20 lg:px-8 lg:pt-20 lg:pb-28">
        {{-- Status badge --}}
        <div class="flex flex-wrap items-center gap-3">
            <span class="inline-flex items-center gap-2 rounded-full border border-nexus-lime/30 bg-nexus-olive/40 px-3 py-1.5 text-xs font-medium text-nexus-mist">
                <span class="inline-block h-1.5 w-1.5 animate-pulse rounded-full bg-nexus-lime" aria-hidden="true"></span>
                {{ $statusBadge['label'] }}
                <span class="font-display font-semibold uppercase tracking-wide text-nexus-lime">{{ $statusBadge['value'] }}</span>
            </span>
            <span class="hidden text-xs uppercase tracking-[0.18em] text-nexus-muted-3 sm:inline">Цифровая лаборатория · R&D · Прототипы</span>
        </div>

        {{-- Kicker --}}
        <p class="mt-8 max-w-4xl font-display text-sm font-medium uppercase tracking-[0.06em] text-nexus-muted-4 sm:text-base">{{ $hero['kicker'] }}</p>

        {{-- Title --}}
        <h1 class="mt-4 font-display font-bold uppercase tracking-[0.06em] leading-[0.92]">
            <span class="block text-[13vw] sm:text-[10vw] lg:text-[8.5rem] xl:text-[10rem] text-nexus-mist">{{ $hero['title_lines'][0] }}</span>
            <span class="block text-[13vw] sm:text-[10vw] lg:text-[8.5rem] xl:text-[10rem] text-nexus-lime">{{ $hero['title_lines'][1] }}</span>
            <span class="mt-3 block font-display text-lg font-semibold uppercase tracking-[0.4em] text-nexus-muted-3 sm:text-2xl lg:text-3xl">{{ $tagline }}</span>
        </h1>

        {{-- Subtitle + description --}}
        <div class="mt-10 grid gap-8 lg:mt-14 lg:grid-cols-12">
            <p class="font-display text-lg font-medium uppercase leading-relaxed tracking-wide text-nexus-mist sm:text-xl lg:col-span-7">{{ $hero['subtitle'] }}</p>
            <p class="text-base leading-relaxed text-nexus-muted-3 lg:col-span-5">{{ $hero['description'] }}</p>
        </div>

        {{-- CTAs --}}
        <div class="mt-10 flex flex-col gap-3 sm:flex-row sm:items-center">
            <a href="#contact" class="group inline-flex items-center justify-center gap-2 rounded-xl bg-nexus-lime px-6 py-4 font-display text-base font-semibold uppercase tracking-wide text-nexus-ink transition-colors hover:bg-nexus-lime-hover">
                {{ $hero['primary_cta'] }}
                <svg class="h-5 w-5 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
            </a>
            <a href="#concept" class="inline-flex items-center justify-center gap-2 rounded-xl border border-nexus-lime/40 bg-nexus-olive/30 px-6 py-4 font-display text-base font-semibold uppercase tracking-wide text-nexus-mist transition-colors hover:border-nexus-lime/70 hover:bg-nexus-olive/50">
                {{ $hero['secondary_cta'] }}
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M7 7h10v10"/></svg>
            </a>
        </div>

        {{-- Pillars --}}
        <div class="mt-14 lg:mt-20">
            <div class="mb-5 flex items-center gap-3">
                <span class="h-px flex-1 bg-white/10"></span>
                <span class="font-display text-xs font-semibold uppercase tracking-[0.3em] text-nexus-muted-3">{{ $hero['pillars_title'] }}</span>
                <span class="h-px flex-1 bg-white/10"></span>
            </div>
            <div class="grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/5 lg:grid-cols-4">
                @foreach ($hero['pillars'] as $p)
                    <div class="group relative flex flex-col gap-2 bg-nexus-charcoal/60 p-5 transition-colors hover:bg-nexus-elevated/60 sm:p-6">
                        <span class="font-mono text-xs font-semibold text-nexus-lime">{{ $p['code'] }}</span>
                        <span class="font-display text-xl font-bold uppercase tracking-wide text-nexus-mist sm:text-2xl">{{ $p['name'] }}</span>
                        <span class="text-xs uppercase tracking-[0.2em] text-nexus-muted-3">{{ $p['note'] }}</span>
                        <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-nexus-lime transition-all duration-300 group-hover:w-full" aria-hidden="true"></span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
