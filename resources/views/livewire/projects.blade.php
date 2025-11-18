<section id="projects" class="py-16 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Projects</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach ($this->projects as $project)
                <div data-slot="card" style="border-left-color: {{ $project->color }};"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm border-l-4 hover:shadow-lg transition-shadow">

                    @if ($project->images->count() > 0)
                        <div class="px-6">
                            <div class="grid grid-cols-2 gap-2">
                                @foreach ($project->images->take(4) as $image)
                                    <img src="{{ asset('storage/' . $image->image) }}"
                                        alt="{{ $image->caption ?? $project->title }}"
                                        class="w-full h-32 object-cover rounded-lg border border-slate-200">
                                @endforeach
                            </div>
                            @if ($project->images->count() > 4)
                                <div class="text-xs text-slate-500 mt-2 text-center">
                                    +{{ $project->images->count() - 4 }} more images
                                </div>
                            @endif
                        </div>
                    @endif

                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="font-semibold text-lg flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-folder-kanban w-5 h-5" aria-hidden="true">
                                <path
                                    d="M4 20h16a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.93a2 2 0 0 1-1.66-.9l-.82-1.2A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13c0 1.1.9 2 2 2Z">
                                </path>
                                <path d="M8 10v4"></path>
                                <path d="M12 10v2"></path>
                                <path d="M16 10v6"></path>
                            </svg>{{ $project->title }}
                        </div>
                    </div>
                    <div data-slot="card-content" class="px-6">
                        <div class="text-slate-600 mb-3">
                            {!! $project->description !!}
                        </div>

                        @if ($project->videos->count() > 0)
                            <div class="mb-3">
                                <div class="space-y-2">
                                    @foreach ($project->videos->take(1) as $video)
                                        @if ($video->video_file)
                                            <video controls class="w-full rounded-lg border border-slate-200">
                                                <source src="{{ asset('storage/' . $video->video_file) }}"
                                                    type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @elseif($video->video_url)
                                            <div class="flex items-center gap-1 text-sm text-blue-600 hover:underline">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-video">
                                                    <path
                                                        d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5">
                                                    </path>
                                                    <rect x="2" y="6" width="14" height="12" rx="2">
                                                    </rect>
                                                </svg>
                                                <a href="{{ $video->video_url }}" target="_blank">
                                                    {{ $video->title ?: 'Watch Video' }}
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                    @if ($project->videos->count() > 1)
                                        <div class="text-xs text-slate-500">
                                            +{{ $project->videos->count() - 1 }}
                                            more {{ Str::plural('video', $project->videos->count() - 1) }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif

                        <div class="flex flex-wrap gap-1">
                            @foreach ($project->tags as $tag)
                                @if ($tag)
                                    <span data-slot="badge"
                                        class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground text-xs">
                                        {{ $tag }}
                                    </span>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
