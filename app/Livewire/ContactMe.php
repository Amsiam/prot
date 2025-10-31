<?php

namespace App\Livewire;

use Livewire\Component;

class ContactMe extends Component
{
    #[\Livewire\Attributes\Computed()]
    public function researchAreas()
    {
        return \App\Models\ResearchArea::all();
    }

    #[\Livewire\Attributes\Computed()]
    public function socials()
    {
        return \App\Models\SocialMedia::all();
    }

    #[\Livewire\Attributes\Computed()]
    public function contact()
    {
        return \App\Models\Contact::first();
    }

    #[\Livewire\Attributes\Computed()]
    public function me()
    {
        return \App\Models\MySelf::first();
    }

    public function render()
    {
        return view('livewire.contact-me');
    }
}
