<?php

namespace App\Livewire;

use Livewire\Component;

class Images extends Component
{
    public $selectedCategory = 'all';
    public function filterImages($category)
    {
        $this->selectedCategory = $category;
    }

    #[\Livewire\Attributes\Computed()]
    public function imageCategories()
    {
        return \App\Models\Galary::pluck('category')->unique()->prepend('all');
    }
    #[\Livewire\Attributes\Computed()]
    public function images()
    {
        return \App\Models\Galary::when($this->selectedCategory != 'all', function ($query) {
            $query->where('category', $this->selectedCategory);
        })
            ->get();
    }
    public function render()
    {
        return view('livewire.images');
    }
}
