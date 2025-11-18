<section class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-8 flex items-center gap-2"><svg
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-award w-8 h-8" aria-hidden="true">
                        <path
                            d="m15.477 12.89 1.515 8.526a.5.5 0 0 1-.81.47l-3.58-2.687a1 1 0 0 0-1.197 0l-3.586 2.686a.5.5 0 0 1-.81-.469l1.514-8.526">
                        </path>
                        <circle cx="12" cy="8" r="6"></circle>
                    </svg>Honors &amp; Awards</h2>
                <div class="space-y-4">
                    @foreach ($this->honourAwards as $awards)
                        <div data-slot="card"
                            class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-l-4 border-l-yellow-500 hover:shadow-lg transition-shadow">
                            <div data-slot="card-content" class="px-6 pt-4">
                                <h4 class="font-semibold">{{ $awards->title }}</h4>
                                <p class="text-slate-600 text-sm mb-2">{{ $awards->awarded_by }} | {{ $awards->date }}
                                </p>
                                <p class="text-slate-600 text-xs">{{ $awards->description }}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div>
                <h2 class="text-3xl font-bold text-slate-900 mb-8">Technical Skills &amp; Expertise</h2>
                <div class="space-y-6">
                    @foreach ($this->technicalSkills as $ts)
                        <div>
                            <h4 class="font-semibold mb-3 flex items-center gap-2"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-database w-4 h-4" aria-hidden="true">
                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                    <path d="M3 5V19A9 3 0 0 0 21 19V5"></path>
                                    <path d="M3 12A9 3 0 0 0 21 12"></path>
                                </svg>{{ $ts->title }}</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach ($ts->tags as $tag)
                                    @if ($tag)
                                        <span data-slot="badge"
                                            class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&amp;&gt;svg]:size-3 gap-1 [&amp;&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-primary text-primary-foreground [a&amp;]:hover:bg-primary/90">
                                            {{ $tag }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
