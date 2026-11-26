@php $r = config('lab.risks'); @endphp

<section id="risks" class="relative w-full scroll-mt-24 bg-nexus-mist text-nexus-ink">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-ink" aria-hidden="true"></span>{{ $r['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $r['title'] }}</h2>

        <div class="mt-12 grid gap-5 md:grid-cols-3">
            @foreach ($r['items'] as $item)
                <article class="group relative flex flex-col gap-6 overflow-hidden rounded-2xl border border-nexus-ink/10 bg-white p-7">
                    <div class="flex items-center justify-between">
                        <span class="inline-flex h-11 w-11 items-center justify-center rounded-xl bg-nexus-ink/[0.06] text-nexus-ink ring-1 ring-inset ring-nexus-ink/10">
                            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                        </span>
                        <span class="font-mono text-xs font-semibold text-nexus-muted">{{ $item['code'] }}</span>
                    </div>
                    <div class="flex flex-col gap-2">
                        <span class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted">Риск</span>
                        <h3 class="font-display text-lg font-semibold leading-snug text-nexus-ink">{{ $item['risk'] }}</h3>
                    </div>
                    <div class="h-px w-full bg-nexus-ink/10"></div>
                    <div class="flex flex-col gap-2">
                        <span class="inline-flex items-center gap-2 font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-teal">
                            <svg class="h-3.5 w-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                            Снижение
                        </span>
                        <p class="text-sm leading-relaxed text-nexus-charcoal">{{ $item['mitigation'] }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
