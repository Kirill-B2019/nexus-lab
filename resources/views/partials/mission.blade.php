@php $m = config('lab.mission'); @endphp

<section id="concept" class="relative w-full scroll-mt-24 bg-nexus-mist text-nexus-ink">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted">
            <span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-ink" aria-hidden="true"></span>
            {{ $m['eyebrow'] }}
        </span>
        <h2 class="mt-4 font-display font-semibold uppercase tracking-tight text-3xl sm:text-4xl md:text-[2.75rem] md:leading-[3.25rem] text-balance">{{ $m['title'] }}</h2>

        <div class="mt-12 grid gap-10 lg:grid-cols-12">
            <p class="font-display text-2xl font-medium leading-snug text-nexus-ink sm:text-3xl lg:col-span-7">{{ $m['lead'] }}</p>
            <p class="text-base leading-relaxed text-nexus-muted lg:col-span-5">{{ $m['body'] }}</p>
        </div>

        <blockquote class="mt-14 flex flex-col gap-6 rounded-3xl border border-nexus-ink/10 bg-nexus-ink p-8 text-nexus-mist sm:p-12">
            <svg class="h-8 w-8 text-nexus-lime" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M9.5 6C6.5 6 4 8.5 4 11.5V18h6v-6.5H7.2c0-1.8 1.3-3 3.3-3V6zm10 0c-3 0-5.5 2.5-5.5 5.5V18h6v-6.5h-2.8c0-1.8 1.3-3 3.3-3V6z"/></svg>
            <p class="font-display text-xl font-medium uppercase leading-relaxed tracking-wide sm:text-2xl">{{ $m['quote'] }}</p>
            <div class="flex flex-wrap items-center gap-6 pt-2">
                @foreach ($m['tags'] as $t)
                    <span class="font-display text-xs font-semibold uppercase tracking-[0.22em] text-nexus-muted-3">{{ $t }}</span>
                @endforeach
            </div>
        </blockquote>
    </div>
</section>
