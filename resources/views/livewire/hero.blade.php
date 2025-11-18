<section class="py-20 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-3 gap-12 items-start">
            <div class="lg:col-span-2">
                <div class="flex items-start gap-6 mb-8">
                    <div class="relative"><img alt="{{ $this->me->name }}" decoding="async" data-nimg="1"
                            class="rounded-full object-cover border-4 border-blue-800 shadow-lg w-30 h-30"
                            style="color:transparent" src="{{ asset('storage/' . $this->me->profile_image) }}" />
                        <div
                            class="absolute -bottom-2 -right-2 bg-green-500 w-6 h-6 rounded-full border-2 border-white">
                        </div>
                    </div>
                    <div class="flex-1">
                        <h1 class="text-5xl font-bold text-slate-900 mb-4">{{ $this->me->name }}</h1>
                        <p class="text-xl text-slate-600 mb-4">{{ $this->me->subtitle }}</p>
                        <div class="flex items-center gap-4 text-sm text-slate-500">
                            <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-map-pin w-4 h-4" aria-hidden="true">
                                    <path
                                        d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                    </path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg><span>{{ $this->contact->address }}</span></div>
                            <div class="flex items-center gap-1"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-graduation-cap w-4 h-4" aria-hidden="true">
                                    <path
                                        d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z">
                                    </path>
                                    <path d="M22 10v6"></path>
                                    <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                                </svg><span>RUET Graduate</span></div>
                        </div>
                    </div>
                </div>
                <div class="mb-6">
                    <p class="text-lg text-slate-700 leading-relaxed mb-6">
                        {!! $this->me->description !!}
                    </p>
                    <div class="flex flex-wrap gap-3 mb-8">
                        @foreach ($this->me->tags as $tag)
                            @if ($tag)
                                <span data-slot="badge"
                                    class="inline-flex items-center justify-center rounded-md border text-xs font-medium w-fit whitespace-nowrap shrink-0 px-2.5 py-1.5 bg-gray-100 text-gray-700 border-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:border-gray-700">
                                    {{ $tag }}
                                </span>
                            @endif
                        @endforeach

                    </div>
                    <div class="flex gap-4"><a data-slot="button"
                            class="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-black text-white hover:bg-black/80 h-9 px-4 py-2 has-[>svg]:px-3"
                            href="#contact"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-4 h-4 mr-2"
                                aria-hidden="true">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            </svg>Contact Me</a>
                        @foreach ($this->socials as $social)
                            <a target="_blank" data-slot="button"
                                class="uppercase inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-9 px-4 py-2 has-[&gt;svg]:px-3"
                                href="{{ $social->url }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-external-link w-4 h-4 mr-2" aria-hidden="true">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>{{ $social->platform }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="lg:col-span-1 space-y-6">
                <div data-slot="card"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 py-6 shadow-sm">
                    <div data-slot="card-header"
                        class="grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="leading-none font-semibold flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-map-pin w-5 h-5" aria-hidden="true">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>Contact Information</div>
                    </div>
                    <div data-slot="card-content" class="px-6 space-y-4">
                        <div class="flex items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-mail w-4 h-4 text-slate-500" aria-hidden="true">
                                <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                                <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            </svg><span class="text-sm">{{ $this->contact->email }}</span></div>
                        <div class="flex items-center gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-phone w-4 h-4 text-slate-500" aria-hidden="true">
                                <path
                                    d="M13.832 16.568a1 1 0 0 0 1.213-.303l.355-.465A2 2 0 0 1 17 15h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2A18 18 0 0 1 2 4a2 2 0 0 1 2-2h3a2 2 0 0 1 2 2v3a2 2 0 0 1-.8 1.6l-.468.351a1 1 0 0 0-.292 1.233 14 14 0 0 0 6.392 6.384">
                                </path>
                            </svg><span class="text-sm">{{ $this->contact->phone }}</span></div>
                        <div class="flex items-start gap-3"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="lucide lucide-map-pin w-4 h-4 text-slate-500 mt-0.5" aria-hidden="true">
                                <path
                                    d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0">
                                </path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <div class="text-sm">
                                <p class="font-medium">Professional Address:</p>
                                <p class="text-slate-600">{{ $this->contact->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-slot="card"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border border-gray-200 py-6 shadow-sm">
                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="leading-none font-semibold flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-trending-up w-5 h-5" aria-hidden="true">
                                <path d="M16 7h6v6"></path>
                                <path d="m22 7-8.5 8.5-5-5L2 17"></path>
                            </svg>Academic Metrics</div>
                    </div>
                    <div data-slot="card-content" class="px-6 space-y-3">
                        <div class="flex justify-between"><span
                                class="text-sm text-slate-600">Publications</span><span
                                class="font-semibold">{{ $this->publications->count() }}+</span></div>
                        <div class="flex justify-between"><span class="text-sm text-slate-600">Under
                                Review</span>
                            <span
                                class="font-semibold">{{ $this->publications->where('status', 'In Review')->count() }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-sm text-slate-600">IN Progress</span>
                            <span
                                class="font-semibold">{{ $this->publications->where('status', 'In Progress')->count() }}</span>
                        </div>
                        <div class="flex justify-between"><span class="text-sm text-slate-600">CGPA</span><span
                                class="font-semibold">3.70/4.00</span></div>
                        <div class="flex justify-between"><span class="text-sm text-slate-600">Research
                                Areas</span><span class="font-semibold">{{ $this->researchAreas->count() }}</span>
                        </div>
                    </div>
                </div>
                {{-- <div data-slot="card"
                    class="text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm bg-gradient-to-br from-blue-50 to-indigo-50 border-blue-200">
                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="leading-none font-semibold text-blue-900">Currently
                            Available</div>
                    </div>
                    <div data-slot="card-content" class="px-6">
                        <ul class="text-sm text-blue-800 space-y-2">
                            <li>• PhD Research Opportunities</li>
                            <li>• Research Collaborations</li>
                            <li>• Academic Partnerships</li>
                            <li>• Consulting Projects</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
