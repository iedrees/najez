<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use App\Models\Project;

class Projects extends Component
{
    public $items;

    public function mount()
    {
        $this->items = Project::get();
    }

    public function render()
    {
        return view('livewire.home.projects');
    }
}
