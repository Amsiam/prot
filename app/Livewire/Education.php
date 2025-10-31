<?php

namespace App\Livewire;

use Livewire\Component;

class Education extends Component
{

    #[\Livewire\Attributes\Computed()]
    public function experiences()
    {
        return \App\Models\Experience::all();
    }

    public function render()
    {
        return view('livewire.education');
    }
}
