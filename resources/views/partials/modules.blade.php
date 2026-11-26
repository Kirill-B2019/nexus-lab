@php
    $mod = config('lab.modules');
    $accentMap = [
        'lime'   => ['dot' => 'bg-nexus-lime',   'text' => 'text-nexus-lime',   'chipBg' => 'bg-nexus-lime/15',   'bg' => 'bg-nexus-lime'],
        'teal'   => ['dot' => 'bg-nexus-teal',   'text' => 'text-nexus-teal',   'chipBg' => 'bg-nexus-teal/15',   'bg' => 'bg-nexus-teal'],
        'purple' => ['dot' => 'bg-nexus-purple', 'text' => 'text-nexus-purple', 'chipBg' => 'bg-nexus-purple/15', 'bg' => 'bg-nexus-purple'],
        'olive'  => ['dot' => 'bg-nexus-olive',  'text' => 'text-nexus-olive',  'chipBg' => 'bg-nexus-olive/15',  'bg' => 'bg-nexus-olive'],
        'muted'  => ['dot' => 'bg-nexus-muted-3','text' => 'text-nexus-muted-3','chipBg' => 'bg-white/10',        'bg' => 'bg-nexus-muted-3'],
    ];
    $iconSvg = [
        'M1' => '<path d="M12 2a10 10 0 1 0 0 20 10 10 0 0 0 0-20zm0 0L8 12m4-10 4 10M2 12h20"/>',
        'M2' => '<polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/>',
        'M3' => '<path d="M3 3v18h18"/><path d="m7 14 3-3 3 3 5-5"/>',
        'M4' => '<path d="M12 3v18M3 7h18M3 12h18M3 17h18"/>',
        'M5' => '<path d="M9 2v6L4 20a1 1 0 0 0 .9 1.5h14.2A1 1 0 0 0 20 20L15 8V2M7 2h10"/>',
    ];
@endphp

<section id="modules" class="relative w-full scroll-mt-24 bg-nexus-mist text-nexus-ink">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-ink" aria-hidden="true"></span>{{ $mod['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $mod['title'] }}</h2>
        <p class="mt-4 max-w-2xl text-base sm:text-lg leading-relaxed text-nexus-muted">{{ $mod['subtitle'] }}</p>

        {{-- Cards grid --}}
        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($mod['items'] as $m)
                @php $a = $accentMap[$m['accent']] ?? $accentMap['lime']; @endphp
                <article class="group relative flex flex-col gap-6 rounded-2xl border border-nexus-ink/10 bg-white p-6 transition-shadow hover:shadow-[0_18px_40px_-24px_rgba(14,14,14,0.25)] sm:p-7">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl {{ $a['chipBg'] }} {{ $a['text'] }} ring-1 ring-inset ring-black/5">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$m['code']] ?? '' !!}</svg>
                        </span>
                        <span class="font-mono text-xs font-semibold text-nexus-muted">{{ $m['code'] }}</span>
                    </div>
                    <h3 class="font-display text-xl font-semibold uppercase leading-snug tracking-tight text-nexus-ink sm:text-2xl">{{ $m['name'] }}</h3>
                    <dl class="mt-1 flex flex-col gap-4 text-sm">
                        <div class="flex flex-col gap-1">
                            <dt class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted">Назначение</dt>
                            <dd class="leading-relaxed text-nexus-charcoal">{{ $m['purpose'] }}</dd>
                        </div>
                        <div class="h-px w-full bg-nexus-ink/10"></div>
                        <div class="flex flex-col gap-1">
                            <dt class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted">Результат</dt>
                            <dd class="leading-relaxed font-medium text-nexus-ink">{{ $m['result'] }}</dd>
                        </div>
                    </dl>
                    <span class="absolute bottom-0 left-0 h-0.5 w-0 {{ $a['bg'] }} transition-all duration-300 group-hover:w-full" aria-hidden="true"></span>
                </article>
            @endforeach
        </div>

        {{-- Table view --}}
        <div class="mt-10 overflow-hidden rounded-2xl border border-nexus-ink/10 bg-white">
            <div class="hidden grid-cols-12 gap-4 border-b border-nexus-ink/10 bg-nexus-ink/5 px-6 py-4 sm:grid">
                @foreach ($mod['columns'] as $i => $c)
                    <span class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted {{ $i === 0 ? 'col-span-3' : ($i === 1 ? 'col-span-5' : 'col-span-4') }}">{{ $c }}</span>
                @endforeach
            </div>
            <ul class="divide-y divide-nexus-ink/10">
                @foreach ($mod['items'] as $m)
                    @php $a = $accentMap[$m['accent']] ?? $accentMap['lime']; @endphp
                    <li class="grid grid-cols-1 gap-2 px-6 py-5 transition-colors hover:bg-nexus-ink/[0.02] sm:grid-cols-12 sm:gap-4">
                        <div class="flex items-center gap-3 sm:col-span-3">
                            <span class="inline-block h-2 w-2 rounded-full {{ $a['dot'] }}" aria-hidden="true"></span>
                            <span class="font-display text-base font-semibold uppercase tracking-tight text-nexus-ink">{{ $m['name'] }}</span>
                        </div>
                        <p class="text-sm text-nexus-charcoal sm:col-span-5">{{ $m['purpose'] }}</p>
                        <p class="text-sm font-medium text-nexus-ink sm:col-span-4">{{ $m['result'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
