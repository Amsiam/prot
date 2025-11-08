<?php

namespace App\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Component;

class HonourAward extends Component
{

    #[Computed()]
    public function honourAwards()
    {
        return \App\Models\HonourAward::get();
    }

    #[Computed()]
    public function technicalSkills()
    {
        return \App\Models\TechnicalSkill::get();
    }
    public function render()
    {
        return view('livewire.honour-award');
    }
}
