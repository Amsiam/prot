<section id="research" class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Research Interests & Expertise</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($this->researchAreas as $ra)
                <div data-slot="card" style="border-left-color: {{ $ra->color }};"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-l-4 hover:shadow-lg transition-shadow">
                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="font-semibold text-lg flex items-center gap-2"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-database w-5 h-5" aria-hidden="true">
                                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                <path d="M3 5V19A9 3 0 0 0 21 19V5"></path>
                                <path d="M3 12A9 3 0 0 0 21 12"></path>
                            </svg>{{ $ra->title }}</div>
                    </div>
                    <div data-slot="card-content" class="px-6">
                        <div class="text-slate-600 mb-3">
                            {!! $ra->description !!}
                        </div>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($ra->tags as $tag)
                                @if ($tag)
                                    <span data-slot="badge"
                                        class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&&gt;svg]:size-3 gap-1 [&&gt;svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs">
                                        {{ $tag }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
</section>
