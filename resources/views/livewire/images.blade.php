<section id="gallery" class="py-16 px-6">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-slate-900 mb-4 flex items-center justify-center gap-2"><svg
                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="lucide lucide-camera w-8 h-8" aria-hidden="true">
                    <path
                        d="M13.997 4a2 2 0 0 1 1.76 1.05l.486.9A2 2 0 0 0 18.003 7H20a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h1.997a2 2 0 0 0 1.759-1.048l.489-.904A2 2 0 0 1 10.004 4z">
                    </path>
                    <circle cx="12" cy="13" r="3"></circle>
                </svg>Professional Gallery</h2>
            <p class="text-lg text-slate-600 max-w-3xl mx-auto">A visual showcase of my research work,
                fieldwork experiences, academic presentations, and professional collaborations in urban planning
                and geospatial analysis.</p>
        </div>
        <div class="space-y-6">
            <div class="flex flex-wrap gap-2 justify-center">

                @foreach ($this->imageCategories as $category)
                    <span wire:click="filterImages('{{ $category }}')" data-slot="badge"
                        class="inline-flex items-center justify-center rounded-md border px-2 py-0.5 text-xs font-medium w-fit whitespace-nowrap shrink-0 [&>svg]:size-3 gap-1 [&>svg]:pointer-events-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive transition-[color,box-shadow] overflow-hidden text-foreground [a&]:hover:bg-accent [a&]:hover:text-accent-foreground cursor-pointer capitalize
                        {{ $this->selectedCategory === $category ? 'bg-black text-white' : '' }}
                        ">{{ $category }}</span>
                @endforeach
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($this->images as $image)
                    <a href="{{ $image->link }}" target="_blank" rel="noopener noreferrer">
                        <div data-slot="card"
                            class="bg-card text-card-foreground flex flex-col gap-6 rounded-xl border py-6 shadow-sm overflow-hidden cursor-pointer hover:shadow-lg transition-shadow">
                            <div data-slot="card-content" class="p-0">
                                <div class="relative aspect-video"><img alt="Community Survey Work" loading="lazy"
                                        decoding="async" data-nimg="fill" class="object-cover"
                                        style="position:absolute;height:100%;width:100%;left:0;top:0;right:0;bottom:0;color:transparent"
                                        sizes="100vw" src="{{ asset('storage/' . $image->image_path) }}">
                                    <div
                                        class="absolute inset-0 bg-black/0 hover:bg-black/20 transition-colors flex items-end">
                                        <div class="p-4 text-white opacity-0 hover:opacity-100 transition-opacity">
                                            <h4 class="font-semibold">
                                                {{ $image->title }}
                                            </h4>
                                            <div class="text-sm">
                                                {{ $image->description }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
