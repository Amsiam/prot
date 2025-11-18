<section id="about" class="py-16 px-6 bg-slate-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-slate-900 mb-12 text-center">Education & Academic Background
        </h2>
        <div class="grid md:grid-cols-1 gap-8">
            @foreach ($this->educations as $education)
                {{-- @dd($education) --}}
                <div data-slot="card"
                    class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-blue-500 to-indigo-500">
                    </div>
                    <div data-slot="card-header"
                        class="@container/card-header grid auto-rows-min grid-rows-[auto_auto] items-start gap-1.5 px-6 has-data-[slot=card-action]:grid-cols-[1fr_auto] [.border-b]:pb-6">
                        <div data-slot="card-title" class="leading-none font-semibold flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-graduation-cap w-5 h-5" aria-hidden="true">
                                <path
                                    d="M21.42 10.922a1 1 0 0 0-.019-1.838L12.83 5.18a2 2 0 0 0-1.66 0L2.6 9.08a1 1 0 0 0 0 1.832l8.57 3.908a2 2 0 0 0 1.66 0z">
                                </path>
                                <path d="M22 10v6"></path>
                                <path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"></path>
                            </svg>{{ $education->degree_name }}
                        </div>
                        <div class="flex items-center justify-between gap-4">
                            <div data-slot="card-description" class="text-muted-foreground text-sm">
                                {{ $education->institution }}
                            </div>
                            <div data-slot="card-description" class="text-muted-foreground text-sm">
                                {{ $education->start_date }} -
                                {{ $education->end_date ? $education->end_date : 'Present' }}
                            </div>
                        </div>
                    </div>
                    <div data-slot="card-content" class="px-6">
                        <div class="flex items-center gap-4 mb-4">
                            @foreach ($education->tags as $tag)
                                @if ($tag)
                                    <span data-slot="badge"
                                        class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground">
                                        {{ $tag }}</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="text-slate-600 mb-4">
                            {!! $education->description !!}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
