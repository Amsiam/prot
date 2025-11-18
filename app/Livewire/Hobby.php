<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Hobby extends Component
{

    #[Computed()]
    public function hobbies()
    {
        return \App\Models\Hobby::orderBy('order')->get();
    }

    public function render()
    {
        return view('livewire.hobby');
    }
}
