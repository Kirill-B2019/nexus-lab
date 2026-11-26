@php
    $a = config('lab.audience');
    $iconSvg = [
        '<path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4"/><path d="M9 9v.01M9 12v.01M9 15v.01"/>',
        '<path d="M9 18h6M10 22h4M12 2a7 7 0 0 0-4 12.7c.5.4 1 .9 1 1.3v2h6v-2c0-.4.5-.9 1-1.3A7 7 0 0 0 12 2z"/>',
        '<path d="M3 21h18M5 21V8l7-4 7 4v13M9 21v-5h6v5"/>',
        '<path d="M21 12V7H5a2 2 0 0 1 0-4h14v4M3 5v14a2 2 0 0 0 2 2h16v-5M18 12a2 2 0 0 0 0 4h3v-4z"/>',
    ];
@endphp

<section id="audience" class="relative w-full scroll-mt-24 bg-nexus-mist text-nexus-ink">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-ink" aria-hidden="true"></span>{{ $a['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $a['title'] }}</h2>

        <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($a['items'] as $i => $item)
                <article class="group relative flex flex-col gap-5 rounded-2xl border border-nexus-ink/10 bg-white p-6 transition-all hover:-translate-y-0.5 hover:border-nexus-ink/20 hover:shadow-[0_18px_40px_-24px_rgba(14,14,14,0.25)]">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-nexus-ink text-nexus-lime">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">{!! $iconSvg[$i % count($iconSvg)] !!}</svg>
                        </span>
                        <span class="font-mono text-xs font-semibold text-nexus-muted">{{ $item['code'] }}</span>
                    </div>
                    <h3 class="font-display text-lg font-semibold leading-snug text-nexus-ink">{{ $item['title'] }}</h3>
                    <p class="text-sm leading-relaxed text-nexus-muted">{{ $item['text'] }}</p>
                </article>
            @endforeach
        </div>
    </div>
</section>
