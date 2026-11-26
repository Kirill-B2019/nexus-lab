@php
    $s = config('lab.services');
    $iconSvg = [
        '<path d="M11 2 2 12l9 10M5 12h16"/><circle cx="20" cy="12" r="1.5"/>',
        '<path d="M5 13c0-5 4-9 9-9 0 5-4 9-9 9zM5 13c0 5 4 9 9 9 0-5-4-9-9-9z"/><path d="M19 5 5 19"/>',
        '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        '<path d="M3 3v18h18"/><rect x="7" y="11" width="3" height="6"/><rect x="12" y="7" width="3" height="10"/><rect x="17" y="13" width="3" height="4"/>',
        '<path d="M12 3v18M3 7h18M3 12h18M3 17h18"/>',
        '<path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 2 9 2 12 0v-5"/>',
    ];
@endphp

<section id="services" class="relative w-full scroll-mt-24 bg-nexus-ink text-nexus-mist">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted-4"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>{{ $s['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-nexus-mist text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $s['title'] }}</h2>
        <p class="mt-4 max-w-2xl text-base sm:text-lg leading-relaxed text-nexus-muted-4">{{ $s['subtitle'] }}</p>

        <div class="mt-12 grid gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($s['items'] as $i => $item)
                <article class="group relative flex h-full flex-col gap-5 bg-nexus-charcoal/70 p-7 transition-colors hover:bg-nexus-elevated/60">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-nexus-lime/10 text-nexus-lime ring-1 ring-inset ring-nexus-lime/20">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$i % count($iconSvg)] !!}</svg>
                        </span>
                        <span class="rounded-md bg-white/5 px-2 py-1 font-mono text-[11px] font-semibold uppercase tracking-wider text-nexus-muted-3">{{ $item['format'] }}</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-mono text-xs font-semibold text-nexus-lime">{{ $item['code'] }}</span>
                        <h3 class="font-display text-lg font-semibold uppercase leading-snug tracking-tight text-nexus-mist">{{ $item['title'] }}</h3>
                    </div>
                    <p class="text-sm leading-relaxed text-nexus-muted-3">{{ $item['text'] }}</p>
                    <a href="#contact" class="mt-auto inline-flex items-center gap-1.5 pt-2 font-display text-xs font-semibold uppercase tracking-[0.18em] text-nexus-lime transition-opacity hover:opacity-80">
                        Обсудить
                        <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M7 7h10v10"/></svg>
                    </a>
                    <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-nexus-lime transition-all duration-300 group-hover:w-full" aria-hidden="true"></span>
                </article>
            @endforeach
        </div>
    </div>
</section>
