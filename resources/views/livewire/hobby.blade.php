<section id="hobbies" class="py-16 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Hobbies & Interests</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">

            @foreach ($this->hobbies as $hobby)
                <div data-slot="card"
                    class="bg-card text-card-foreground flex flex-col items-center gap-4 rounded-xl border p-6 shadow-sm hover:shadow-lg transition-shadow text-center">
                    @if ($hobby->icon)
                        <div class="text-4xl">
                            {{ $hobby->icon }}
                        </div>
                    @endif
                    <div>
                        <div data-slot="card-title" class="font-semibold text-lg mb-2">
                            {{ $hobby->title }}
                        </div>
                        @if ($hobby->description)
                            <div class="text-slate-600 text-sm">
                                {{ $hobby->description }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
