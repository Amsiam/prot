<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Publications extends Component
{
    #[Computed()]
    public function publications()
    {
        return \App\Models\Publication::all();
    }
    public function render()
    {
        return view('livewire.publications');
    }
}
