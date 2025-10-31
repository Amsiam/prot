<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Hero extends Component
{
    #[Computed()]
    public function me()
    {
        return \App\Models\MySelf::with('tagsR')->first();
    }

    #[Computed()]
    public function contact()
    {
        return \App\Models\Contact::first();
    }

    #[Computed()]
    public function socials()
    {
        return \App\Models\SocialMedia::all();
    }

    #[Computed()]
    public function publications()
    {
        return \App\Models\Publication::all();
    }

    #[Computed()]
    public function researchAreas()
    {
        return \App\Models\ResearchArea::all();
    }

    public function render()
    {
        return view('livewire.hero');
    }
}
