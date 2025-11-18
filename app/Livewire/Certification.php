<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Certification extends Component
{

    #[Computed()]
    public function certifications()
    {
        return \App\Models\Certification::orderBy('order')->orderBy('date', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.certification');
    }
}
