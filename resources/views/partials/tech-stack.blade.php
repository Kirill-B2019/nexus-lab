@php
    $t = config('lab.tech_stack');
    $iconSvg = [
        '<path d="M7 7l10 10M7 17 17 7"/><path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>',
        '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        '<path d="M3 3v18h18"/><rect x="7" y="11" width="3" height="6"/><rect x="12" y="7" width="3" height="10"/><rect x="17" y="13" width="3" height="4"/>',
        '<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><path d="m9 15 2 2 4-4"/>',
        '<ellipse cx="12" cy="5" rx="9" ry="3"/><path d="M3 5v14a9 3 0 0 0 18 0V5"/><path d="M3 12a9 3 0 0 0 18 0"/>',
    ];
    $layers = $t['layers'];
    $total = count($layers);
@endphp

<section id="stack" class="relative w-full scroll-mt-24 bg-nexus-ink text-nexus-mist">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted-4"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>{{ $t['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-nexus-mist text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $t['title'] }}</h2>
        <p class="mt-4 max-w-2xl text-base sm:text-lg leading-relaxed text-nexus-muted-4">{{ $t['subtitle'] }}</p>

        <div class="mt-12 grid gap-8 lg:grid-cols-12">
            {{-- Layered stack --}}
            <div class="lg:col-span-7">
                <div class="flex flex-col gap-3">
                    @foreach ($layers as $i => $layer)
                        <div class="group relative flex items-center gap-4 rounded-2xl border border-white/10 bg-nexus-charcoal/70 p-5 transition-colors hover:border-nexus-lime/30 sm:p-6" style="margin-left: {{ $i * 12 }}px">
                            <span class="inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-nexus-lime/10 text-nexus-lime ring-1 ring-inset ring-nexus-lime/20">
                                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$i % count($iconSvg)] !!}</svg>
                            </span>
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center gap-3">
                                    <span class="font-mono text-[11px] font-semibold text-nexus-muted-3">L{{ $total - $i }}</span>
                                    <h3 class="font-display text-base font-semibold uppercase tracking-tight text-nexus-mist sm:text-lg">{{ $layer['name'] }}</h3>
                                </div>
                                <p class="text-sm leading-relaxed text-nexus-muted-3">{{ $layer['text'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Side note --}}
            <aside class="lg:col-span-5">
                <div class="flex h-full flex-col gap-6 rounded-3xl border border-nexus-lime/20 bg-gradient-to-br from-nexus-olive/30 to-nexus-charcoal p-8">
                    <span class="font-display text-xs font-semibold uppercase tracking-[0.3em] text-nexus-lime">Поток данных</span>
                    <p class="font-display text-xl font-medium leading-snug text-nexus-mist sm:text-2xl">API-шина связывает модули без ручного переноса — данные текут между дисциплинами автоматически.</p>
                    <ol class="flex flex-col gap-4 pt-2">
                        @foreach ($t['flow'] as $idx => $step)
                            <li class="flex items-center gap-3">
                                <span class="inline-flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-nexus-lime font-mono text-xs font-bold text-nexus-ink">{{ $idx + 1 }}</span>
                                <span class="font-display text-sm font-medium uppercase tracking-wide text-nexus-mist">{{ $step }}</span>
                            </li>
                        @endforeach
                    </ol>
                    <div class="mt-auto flex items-center gap-2 pt-4 text-nexus-muted-3">
                        <svg class="h-4 w-4 animate-bounce text-nexus-lime" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="5" x2="12" y2="19"/><polyline points="19 12 12 19 5 12"/></svg>
                        <span class="font-display text-xs font-semibold uppercase tracking-[0.2em]">Полный цикл в одном контуре</span>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
