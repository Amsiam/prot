<section id="publications" class="py-16 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Publications & Research</h2>
        <div class="mb-12">
            <h3 class="text-2xl font-semibold text-slate-800 mb-6 flex items-center gap-2"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-book-open w-6 h-6" aria-hidden="true">
                    <path d="M12 7v14"></path>
                    <path
                        d="M3 18a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1h5a4 4 0 0 1 4 4 4 4 0 0 1 4-4h5a1 1 0 0 1 1 1v13a1 1 0 0 1-1 1h-6a3 3 0 0 0-3 3 3 3 0 0 0-3-3z">
                    </path>
                </svg>Published Works</h3>
            <div class="space-y-6">
                @foreach ($this->publications->where('status', 'Published') as $published)
                    <div data-slot="card"
                        class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-l-4 border-l-green-600 hover:shadow-lg transition-shadow">
                        <div data-slot="card-content" class="px-6 pt-6">

                            <div> {!! $published->title !!}(
                                {{ $published->year }}
                                )
                            </div>
                            <div class="text-slate-600 mb-3">
                                {!! $published->authors !!}
                            </div>
                            <div>
                                {!! $published->publication_name !!}
                            </div>
                            <p class="text-slate-600 mb-4"><strong>My Contribution:</strong>
                                {!! $published->contribution !!}
                            </p>
                            <div class="flex gap-2 mb-4">
                                @foreach ($published->tags as $tag)
                                    <span data-slot="badge"
                                        class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&&gt;svg]:size-3 gap-1 [&&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden border-transparent bg-primary text-primary-foreground [a&]:hover:bg-primary/90">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                            <a target="_blank" data-slot="button"
                                class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive border bg-background shadow-xs hover:bg-accent hover:text-accent-foreground dark:bg-input/30 dark:border-input dark:hover:bg-input/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5"
                                href="{{ $published->link }}"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="lucide lucide-external-link w-4 h-4 mr-2" aria-hidden="true">
                                    <path d="M15 3h6v6"></path>
                                    <path d="M10 14 21 3"></path>
                                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                </svg>View Publication</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <h3 class="text-2xl font-semibold text-slate-800 mb-6">Research In Progress & Under Review</h3>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($this->publications->where('status', '!=', 'Published') as $unpublished)
                    <div data-slot="card"
                        class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-l-4 border-l-yellow-500 hover:shadow-lg transition-shadow">
                        <div data-slot="card-content" class="px-6 pt-6">
                            {{ $unpublished->title }}
                            <div class="text-slate-600 text-sm mb-2">
                                {!! $unpublished->abstract !!}
                            </div>
                            <div class="flex gap-1">
                                @foreach ($unpublished->tags as $tag)
                                    <span data-slot="badge"
                                        class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&&gt;svg]:size-3 gap-1 [&&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs">
                                        {{ $tag }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
