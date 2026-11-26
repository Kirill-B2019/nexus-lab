@php
    $p = config('lab.principles');
    $icons = ['layers', 'boxes', 'flask', 'shield', 'network'];
    $iconSvg = [
        'layers'  => '<path d="M12 2 2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>',
        'boxes'   => '<path d="M2.97 12.92A2 2 0 0 0 2 14.63v3.24a2 2 0 0 0 .97 1.71l3 1.8a2 2 0 0 0 2.06 0L12 20l4 2.92a2 2 0 0 0 2.06 0l3-1.8a2 2 0 0 0 .97-1.71v-3.24a2 2 0 0 0-.97-1.71L21 12M7 2.33A2 2 0 0 0 5.02 4.6L7.5 16M21 7.5l-5 3M12 12 5 8.5"/>',
        'flask'   => '<path d="M9 3h6M10 3v6.5L4 20a1 1 0 0 0 .9 1.5h14.2A1 1 0 0 0 20 20l-6-10.5V3M7 16h10"/>',
        'shield'  => '<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/>',
        'network' => '<rect x="2" y="2" width="6" height="6" rx="1"/><rect x="16" y="2" width="6" height="6" rx="1"/><rect x="9" y="16" width="6" height="6" rx="1"/><path d="M5 8v3a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8M12 13v3"/>',
    ];
@endphp

<section id="principles" class="relative w-full scroll-mt-24 bg-nexus-ink text-nexus-mist">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted-4">
            <span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>
            {{ $p['eyebrow'] }}
        </span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-nexus-mist text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $p['title'] }}</h2>

        <div class="mt-12 grid gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($p['items'] as $i => $item)
                <article class="group relative flex flex-col gap-5 bg-nexus-charcoal/70 p-6 transition-colors hover:bg-nexus-elevated/60 sm:p-8">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-nexus-lime/10 text-nexus-lime ring-1 ring-inset ring-nexus-lime/20">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$icons[$i]] ?? '' !!}</svg>
                        </span>
                        <span class="font-mono text-xs font-semibold text-nexus-muted-3">{{ $item['code'] }}</span>
                    </div>
                    <h3 class="font-display text-xl font-semibold uppercase leading-snug tracking-tight text-nexus-mist">{{ $item['title'] }}</h3>
                    <p class="text-sm leading-relaxed text-nexus-muted-3">{{ $item['text'] }}</p>
                    <span class="absolute bottom-0 left-0 h-0.5 w-0 bg-nexus-lime transition-all duration-300 group-hover:w-full" aria-hidden="true"></span>
                </article>
            @endforeach

            {{-- filler card --}}
            <div class="relative hidden flex-col justify-between gap-5 bg-gradient-to-br from-nexus-lime/15 via-nexus-charcoal/70 to-nexus-charcoal/70 p-8 lg:flex">
                <span class="font-display text-xs font-semibold uppercase tracking-[0.3em] text-nexus-lime">Принципы в работе</span>
                <p class="font-display text-2xl font-medium leading-snug text-nexus-mist">Каждый проект проходит через все принципы одновременно — не по очереди.</p>
                <span class="font-mono text-xs text-nexus-muted-3">5 / 5</span>
            </div>
        </div>
    </div>
</section>
