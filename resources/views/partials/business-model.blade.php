@php
    $b = config('lab.business_model');
    $iconSvg = [
        '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>',
        '<path d="M17 2l4 4-4 4M3 11v-1a4 4 0 0 1 4-4h14M7 22l-4-4 4-4M21 13v1a4 4 0 0 1-4 4H3"/>',
        '<path d="M18 11V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v0M14 10V4a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v2M10 10.5V6a2 2 0 0 0-2-2v0a2 2 0 0 0-2 2v8"/>',
    ];
@endphp

<section id="business" class="relative w-full scroll-mt-24 bg-nexus-mist text-nexus-ink">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-ink" aria-hidden="true"></span>{{ $b['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $b['title'] }}</h2>
        <p class="mt-4 max-w-2xl text-base sm:text-lg leading-relaxed text-nexus-muted">{{ $b['subtitle'] }}</p>

        <div class="mt-12 grid gap-5 lg:grid-cols-3">
            @foreach ($b['streams'] as $i => $stream)
                <article class="group relative flex flex-col gap-6 overflow-hidden rounded-2xl border border-nexus-ink/10 bg-white p-7">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-nexus-ink text-nexus-lime">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$i % count($iconSvg)] !!}</svg>
                        </span>
                        <span class="font-mono text-xs font-semibold text-nexus-muted">{{ $stream['code'] }}</span>
                    </div>
                    <div class="flex items-end justify-between gap-4">
                        <h3 class="font-display text-xl font-semibold uppercase leading-snug tracking-tight text-nexus-ink">{{ $stream['title'] }}</h3>
                        <span class="font-display text-3xl font-bold leading-none text-nexus-lime" style="text-shadow:0 0 1px rgba(14,14,14,0.6)">{{ $stream['share'] }}</span>
                    </div>
                    <p class="text-sm leading-relaxed text-nexus-muted">{{ $stream['text'] }}</p>
                    <div class="mt-2">
                        <div class="h-1.5 w-full overflow-hidden rounded-full bg-nexus-ink/10">
                            <div class="h-full rounded-full bg-nexus-ink transition-all duration-700" style="width: {{ $stream['share'] }}"></div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
