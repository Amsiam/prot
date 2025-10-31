<?php

namespace App\Livewire;

use Livewire\Component;

class Experience extends Component
{
    #[\Livewire\Attributes\Computed()]
    public function experiences()
    {
        return \App\Models\Experience::with('tagsR')->get();
    }
    public function render()
    {
        return view('livewire.experience');
    }
}
