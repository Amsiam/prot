<section id="contact" class="py-16 px-6 bg-slate-50">
    <div class="max-w-4xl mx-auto text-center">
        <div class="mb-8"><img alt="{{ $this->me->name }}" loading="lazy" width="80" height="80" decoding="async"
                data-nimg="1" class="rounded-full object-cover mx-auto mb-4 border-4 border-white shadow-lg"
                style="color:transparent" src="{{ asset('storage/' . $this->me->profile_image) }}">
            <h2 class="text-3xl font-bold text-slate-900 mb-4">Let's Collaborate on Impactful Research</h2>
        </div>
        <p class="text-xl text-slate-600 mb-6">I'm actively seeking opportunities for doctoral studies,
            research collaborations, and academic partnerships in urban planning, geospatial analysis, and
            climate change adaptation.</p>
        <p class="text-lg text-slate-600 mb-8">Whether you're interested in joint research projects,
            supervision opportunities, or collaborative publications, I'd love to discuss how we can work
            together to address pressing urban and environmental challenges.</p>
        <div class="flex justify-center gap-4 mb-8"><a data-slot="button"
                class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive bg-primary text-primary-foreground shadow-xs hover:bg-primary/90 bg-black text-white hover:bg-black/80 h-10 rounded-md px-6 has-[>svg]:px-4"
                href="mailto:{{ $this->contact->email }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail w-5 h-5 mr-2"
                    aria-hidden="true">
                    <path d="m22 7-8.991 5.727a2 2 0 0 1-2.009 0L2 7"></path>
                    <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                </svg>Email Me</a>

            @foreach ($this->socials as $social)
                <a target="_blank" data-slot="button"
                    class="inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-card shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-10 rounded-md px-6 has-[>svg]:px-4 capitalize"
                    href="{{ $social->url }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-globe w-5 h-5 mr-2" aria-hidden="true">
                        <circle cx="12" cy="12" r="10"></circle>
                        <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                        <path d="M2 12h20"></path>
                    </svg>{{ $social->platform }}</a>
            @endforeach
        </div>
        <div class="grid md:grid-cols-3 gap-6 text-left">
            <div data-slot="card"
                class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm hover:shadow-lg transition-shadow">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="font-semibold text-lg">Research Interests</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <ul class="text-sm text-slate-600 space-y-1">
                        <li>• PhD opportunities in Urban Planning</li>
                        <li>• Climate change adaptation research</li>
                        <li>• Geospatial modeling projects</li>
                        <li>• International collaborations</li>
                    </ul>
                </div>
            </div>
            <div data-slot="card"
                class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm hover:shadow-lg transition-shadow">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="font-semibold text-lg">Available For</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <ul class="text-sm text-slate-600 space-y-1">
                        <li>• Research assistant positions</li>
                        <li>• Conference presentations</li>
                        <li>• Joint publication projects</li>
                        <li>• Consulting opportunities</li>
                    </ul>
                </div>
            </div>
            <div data-slot="card"
                class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm hover:shadow-lg transition-shadow">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="font-semibold text-lg">Expertise Areas</div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <ul class="text-sm text-slate-600 space-y-1">
                        @foreach ($this->researchAreas as $ra)
                            <li>• {{ $ra->title }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
