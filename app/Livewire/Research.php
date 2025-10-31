<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Research extends Component
{
    #[Computed()]
    public function researchAreas()
    {
        return \App\Models\ResearchArea::with('tagsR')->get();
    }
    public function render()
    {
        return view('livewire.research');
    }
}
