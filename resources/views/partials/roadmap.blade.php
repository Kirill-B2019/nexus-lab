@php
    $r = config('lab.roadmap');
    $iconSvg = [
        '<path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91 0z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/>',
        '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        '<circle cx="12" cy="12" r="10"/><path d="M2 12h20M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>',
    ];
@endphp

<section id="roadmap" class="relative w-full scroll-mt-24 bg-nexus-mist text-nexus-ink">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-ink" aria-hidden="true"></span>{{ $r['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $r['title'] }}</h2>

        <div class="mt-12 grid gap-5 md:grid-cols-3">
            @foreach ($r['stages'] as $i => $stage)
                <article class="group relative flex flex-col gap-6 rounded-2xl border border-nexus-ink/10 bg-white p-7">
                    <span class="pointer-events-none absolute right-4 top-2 font-display text-7xl font-bold leading-none text-nexus-ink/[0.04]" aria-hidden="true">{{ $i + 1 }}</span>
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-12 w-12 items-center justify-center rounded-xl bg-nexus-ink text-nexus-lime">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$i % count($iconSvg)] !!}</svg>
                        </span>
                        <span class="rounded-md px-2.5 py-1 font-mono text-[11px] font-semibold uppercase tracking-wider {{ $i === 0 ? 'bg-nexus-lime text-nexus-ink' : 'bg-nexus-ink/5 text-nexus-muted' }}">{{ $stage['status'] }}</span>
                    </div>
                    <div class="flex flex-col gap-1">
                        <span class="font-display text-xs font-semibold uppercase tracking-[0.3em] text-nexus-lime">{{ $stage['stage'] }}</span>
                        <h3 class="font-display text-2xl font-bold uppercase leading-snug tracking-tight text-nexus-ink">{{ $stage['name'] }}</h3>
                    </div>
                    <p class="text-sm leading-relaxed text-nexus-muted">{{ $stage['text'] }}</p>
                    @if ($i < count($r['stages']) - 1)
                        <span class="absolute right-[-10px] top-1/2 hidden h-px w-5 bg-nexus-ink/15 md:block" aria-hidden="true"></span>
                    @endif
                </article>
            @endforeach
        </div>
    </div>
</section>
