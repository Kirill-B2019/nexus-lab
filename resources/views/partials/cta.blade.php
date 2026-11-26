@php $footer = config('lab.footer'); @endphp

<section id="contact" class="relative overflow-hidden bg-nexus-ink text-nexus-mist scroll-mt-24">
    <div class="absolute inset-0 bg-grid-dark" aria-hidden="true"></div>
    <div class="absolute inset-0" aria-hidden="true" style="background: radial-gradient(60% 80% at 0% 50%, rgba(197,255,65,0.16), transparent 60%), radial-gradient(50% 70% at 100% 100%, rgba(150,125,255,0.12), transparent 60%);"></div>

    <div class="relative mx-auto w-full max-w-[1503px] px-4 py-20 sm:px-6 sm:py-28 lg:px-8">
        <div class="grid gap-12 lg:grid-cols-12">
            {{-- Left: copy --}}
            <div class="lg:col-span-6">
                <span class="inline-flex items-center gap-2 label-eyebrow text-nexus-muted-4">
                    <span class="inline-block h-1.5 w-1.5 rounded-full bg-nexus-lime" aria-hidden="true"></span>
                    Запустить проект в лаборатории
                </span>
                <h2 class="mt-5 font-display text-4xl font-bold uppercase leading-[0.95] tracking-tight text-nexus-mist sm:text-5xl lg:text-6xl">
                    От гипотезы<br>
                    <span class="text-nexus-lime">до прототипа</span><br>
                    в одном спринте
                </h2>
                <p class="mt-6 max-w-xl text-base leading-relaxed text-nexus-muted-3 sm:text-lg">
                    Опишите задачу — команда НЕКСУС соберёт междисциплинарный спринт: архитектура, код, финансы и право в одном потоке.
                </p>

                <ul class="mt-8 flex flex-col gap-3">
                    @foreach (['Экспресс-ответ в течение рабочего дня', 'Фиксированный срок и бюджет спринта', 'Прототип, финмодель и юридическая рамка на выходе'] as $t)
                        <li class="flex items-start gap-3 text-sm text-nexus-mist">
                            <span class="mt-0.5 inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-full bg-nexus-lime text-nexus-ink">
                                <svg class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="20 6 9 17 4 12"/></svg>
                            </span>
                            {{ $t }}
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Right: form --}}
            <div class="lg:col-span-6">
                <form data-nexus="contact" method="POST" action="{{ route('contact.store') }}" class="flex flex-col gap-5 rounded-3xl border border-white/10 bg-nexus-charcoal/80 p-6 backdrop-blur sm:p-8">
                    @csrf
                    <div class="grid gap-5 sm:grid-cols-2">
                        <label for="name" class="flex flex-col gap-2">
                            <span class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted-4">Имя</span>
                            <input id="name" name="name" required placeholder="Как к вам обращаться" class="nexus-input">
                        </label>
                        <label for="email" class="flex flex-col gap-2">
                            <span class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted-4">E-mail</span>
                            <input id="email" name="email" type="email" required placeholder="you@company.ru" class="nexus-input">
                        </label>
                    </div>

                    <label for="project" class="flex flex-col gap-2">
                        <span class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted-4">Формат</span>
                        <select id="project" name="project" class="nexus-input appearance-none pr-10">
                            @foreach (config('lab.services.items') as $service)
                                <option value="{{ $service['title'] }}" class="bg-nexus-charcoal text-nexus-mist">{{ $service['title'] }}</option>
                            @endforeach
                            <option value="Другое" class="bg-nexus-charcoal text-nexus-mist">Другое</option>
                        </select>
                    </label>

                    <label for="message" class="flex flex-col gap-2">
                        <span class="font-display text-[11px] font-semibold uppercase tracking-[0.2em] text-nexus-muted-4">Кратко о задаче</span>
                        <textarea id="message" name="message" rows="4" placeholder="Сфера, стадия, что нужно проверить или построить" class="nexus-input resize-none"></textarea>
                    </label>

                    <button type="submit" data-nexus-submit data-idle="Отправить заявку" data-loading="Отправляем…" class="group inline-flex items-center justify-center gap-2 rounded-xl bg-nexus-lime px-6 py-4 font-display text-base font-semibold uppercase tracking-wide text-nexus-ink transition-colors hover:bg-nexus-lime-hover disabled:opacity-70">
                        Отправить заявку
                        <svg class="h-5 w-5 transition-transform group-hover:translate-x-0.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
                    </button>

                    <p class="text-center text-xs text-nexus-muted-3">Нажимая «Отправить», вы соглашаетесь с обработкой персональных данных согласно 152-ФЗ.</p>
                </form>
            </div>
        </div>
    </div>
</section>
