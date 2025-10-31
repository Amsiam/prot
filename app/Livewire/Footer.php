<?php

namespace App\Livewire;

use Livewire\Component;

class Footer extends Component
{
    #[\Livewire\Attributes\Computed()]
    public function me()
    {
        return \App\Models\MySelf::first();
    }

    #[\Livewire\Attributes\Computed()]
    public function socials()
    {
        return \App\Models\SocialMedia::all();
    }

    public function render()
    {
        return <<<'HTML'
        <footer class="py-8 px-6 bg-slate-900 text-white">
            <div class="max-w-6xl mx-auto">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3"><img alt="{{$this->me->name}}" loading="lazy"
                            width="32" height="32" decoding="async" data-nimg="1"
                            class="rounded-full object-cover" style="color:transparent"
                            src="{{asset('storage/'.$this->me->profile_image)}}">
                        <div>
                            <p class="text-slate-400">© 2024 {{$this->me->name}}. All rights reserved.</p>
                            <p class="text-slate-500 text-sm">Passionate about sustainable urban development and
                                climate resilience through innovative geospatial research.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        @foreach ($this->socials as $social)
                            <a target="_blank" data-slot="button"
                                class="inline-flex items-center justify-center whitespace-nowrap text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive hover:bg-accent hover:text-accent-foreground dark:hover:bg-accent/50 h-8 rounded-md gap-1.5 px-3 has-[&gt;svg]:px-2.5 capitalize"
                                href="{{ $social->url }}">{{ $social->platform }}</a>
                        @endforeach
                 </div>
            </div>
        </footer>
        HTML;
    }
}
