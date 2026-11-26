@php $m = config('lab.metrics'); @endphp

<section id="metrics" class="relative w-full scroll-mt-24 bg-nexus-ink text-nexus-mist">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted-4"><span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>{{ $m['eyebrow'] }}</span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-nexus-mist text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $m['title'] }}</h2>

        <div class="mt-12 grid grid-cols-2 gap-px overflow-hidden rounded-2xl border border-white/10 bg-white/5 sm:grid-cols-3 lg:grid-cols-6">
            @foreach ($m['items'] as $i => $item)
                <div class="flex flex-col gap-3 bg-nexus-charcoal/70 p-6 transition-colors hover:bg-nexus-elevated/60">
                    <span class="font-mono text-[11px] font-semibold text-nexus-lime">K{{ $i + 1 }}</span>
                    <span class="font-display text-3xl font-bold leading-none text-nexus-mist sm:text-4xl">{{ $item['value'] }}</span>
                    <span class="text-xs leading-snug text-nexus-muted-3">{{ $item['label'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
