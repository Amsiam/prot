<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class Projects extends Component
{

    #[Computed()]
    public function projects()
    {
        return \App\Models\Project::with(['images', 'videos'])
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('livewire.projects');
    }
}
