@php
    $items = config('lab.marquee');
    $doubled = array_merge($items, $items);
@endphp

<div class="relative border-y border-nexus-ink/10 bg-nexus-charcoal py-4 text-nexus-mist">
    <div class="marquee-mask overflow-hidden">
        <ul class="flex w-max animate-marquee items-center gap-0">
            @foreach ($doubled as $i => $item)
                <li class="flex items-center gap-4 px-5">
                    <span class="font-display text-sm font-semibold uppercase tracking-[0.2em] text-nexus-mist sm:text-base">{{ $item }}</span>
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
