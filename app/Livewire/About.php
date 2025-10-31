<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class About extends Component
{
    #[Computed()]
    public function educations()
    {
        return \App\Models\Education::with('tagsR')->get();
    }
    public function render()
    {
        return view('livewire.about');
    }
}
