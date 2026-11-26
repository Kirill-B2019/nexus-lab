@php $footer = config('lab.footer'); @endphp

<footer class="mt-auto bg-nexus-charcoal text-nexus-mist">
    <div class="mx-auto w-full max-w-[1503px] px-4 py-14 sm:px-6 lg:px-8">
        <div class="grid gap-10 lg:grid-cols-12">
            {{-- Brand + description --}}
            <div class="lg:col-span-5">
                <div class="flex items-center gap-3">
                    <span class="relative inline-flex h-10 w-10 items-center justify-center rounded-lg bg-nexus-ink" aria-hidden="true">
                        <span class="absolute inset-0 rounded-lg ring-1 ring-inset ring-nexus-lime/30"></span>
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none">
                            <path d="M4 20V4M4 20h16M4 12h10M4 4l8 8M12 4l8 16" stroke="#C5FF41" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                    <div class="flex flex-col leading-none">
                        <span class="font-display text-lg font-bold uppercase tracking-[0.18em] text-nexus-mist">{{ config('lab.name') }}</span>
                        <span class="font-display text-[10px] font-semibold uppercase tracking-[0.3em] text-nexus-muted-3">Лаборатория · {{ config('lab.tagline') }}</span>
                    </div>
                </div>
                <p class="mt-5 max-w-md text-sm leading-relaxed text-nexus-muted-3">{{ $footer['description'] }}</p>

                <div class="mt-6 flex flex-wrap gap-2">
                    @foreach (['Архитектура', 'Код', 'Финансы', 'Право', 'R&D'] as $t)
                        <span class="rounded-md border border-white/10 bg-white/5 px-2.5 py-1 font-display text-[11px] font-semibold uppercase tracking-[0.16em] text-nexus-muted-3">{{ $t }}</span>
                    @endforeach
                </div>
            </div>

            {{-- Link columns --}}
            <div class="grid grid-cols-2 gap-8 sm:grid-cols-3 lg:col-span-7">
                @foreach ($footer['columns'] as $col)
                    <div class="flex flex-col gap-3">
                        <h3 class="font-display text-[11px] font-semibold uppercase tracking-[0.22em] text-nexus-lime">{{ $col['title'] }}</h3>
                        <ul class="flex flex-col gap-2">
                            @foreach ($col['links'] as $link)
                                <li><a href="#contact" class="text-sm text-nexus-muted-3 transition-colors hover:text-nexus-mist">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-12 h-px w-full bg-white/10"></div>

        <div class="mt-6 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
            <p class="max-w-2xl text-xs leading-relaxed text-nexus-muted-3">{{ $footer['legal'] }}</p>
            <div class="flex items-center gap-4">
                <a href="#top" class="font-display text-xs font-semibold uppercase tracking-[0.2em] text-nexus-muted-3 transition-colors hover:text-nexus-lime">Наверх ↑</a>
                <span class="inline-flex items-center gap-2 rounded-md border border-nexus-lime/30 bg-nexus-olive/30 px-3 py-1.5 font-display text-[10px] font-semibold uppercase tracking-[0.22em] text-nexus-lime">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>
                    {{ config('lab.tagline') }}
                </span>
            </div>
        </div>
    </div>
</footer>
