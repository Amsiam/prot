<section id="certifications" class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Certifications & Credentials</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($this->certifications as $certification)
                <div data-slot="card"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm hover:shadow-lg transition-shadow">
                    @if ($certification->image)
                        <div class="px-6">
                            <img src="{{ asset('storage/' . $certification->image) }}" alt="{{ $certification->title }}"
                                class="w-full h-48 object-cover rounded-lg border border-slate-200">
                        </div>
                    @endif
                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="font-semibold text-lg flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-award w-5 h-5" aria-hidden="true">
                                <path
                                    d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526">
                                </path>
                                <circle cx="12" cy="8" r="6"></circle>
                            </svg>{{ $certification->title }}
                        </div>
                        <div class="text-sm text-slate-600">
                            {{ $certification->issuer }}
                        </div>
                    </div>
                    <div data-slot="card-content" class="px-6">
                        <div class="text-sm text-slate-500 mb-3">
                            {{ $certification->date->format('F Y') }}
                        </div>
                        @if ($certification->description)
                            <div class="text-slate-600">
                                {!! $certification->description !!}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
