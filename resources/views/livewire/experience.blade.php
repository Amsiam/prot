<section id="experience" class="py-16 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Professional Experience</h2>
        @foreach ($this->experiences->where('is_current', true) as $experience)
            <div data-slot="card"
                class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm mb-8 border-l-4 border-l-blue-600 hover:shadow-lg transition-shadow">
                <div data-slot="card-header"
                    class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                    <div data-slot="card-title" class="leading-none font-semibold flex items-center gap-2"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users w-5 h-5" aria-hidden="true">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                            <path d="M16 3.128a4 4 0 0 1 0 7.744"></path>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                        </svg>
                        {{ $experience->title }}
                    </div>
                    <div data-slot="card-description" class="text-muted-foreground text-sm">
                        {{ $experience->organization }},{{ $experience->location }} |
                        {{ $experience->start_date->format('F Y') }} - Present
                    </div>
                </div>
                <div data-slot="card-content" class="px-6">
                    <div class="mb-4">
                        @foreach ($experience->tags as $tag)
                            @if ($tag)
                                <span data-slot="badge"
                                    class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground">
                                    {{ $tag }}
                                </span>
                            @endif
                        @endforeach
                    </div>
                    <div class="text-slate-600 mb-4">
                        {!! $experience->summary !!}
                    </div>
                    <div class="text-slate-600 mb-4">
                        {!! $experience->responsibilities !!}
                    </div>
                    <div class="text-slate-600 mb-4">
                        {!! $experience->achievements !!}
                    </div>
                </div>
            </div>
        @endforeach
        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($this->experiences->where('is_current', false) as $experience)
                <div data-slot="card"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm hover:shadow-lg transition-shadow">
                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="leading-none font-semibold">{{ $experience->title }}</div>
                        <div data-slot="card-description" class="text-muted-foreground text-sm">
                            {{ $experience->organization }},{{ $experience->location }} |
                            {{ $experience->start_date->format('F Y') }} -
                            {{ $experience->end_date->format('F Y') }}</div>
                    </div>
                    <div data-slot="card-content" class="px-6">
                        <div class="text-slate-600 mb-4">
                            {!! $experience->summary !!}
                        </div>
                        <div class="text-slate-600 mb-4">
                            {!! $experience->responsibilities !!}
                        </div>
                        <div class="text-slate-600 mb-4">
                            {!! $experience->achievements !!}
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>
