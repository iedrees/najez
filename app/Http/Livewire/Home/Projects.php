<?php

namespace App\Http\Livewire\Home;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Project;

class Projects extends Component {
    public $items = [];

    public function mount()
    {
        $this->items = Project::withCount('tasks', 'doneTasks')->get();
    }
    public function render()
    {
        return view('livewire.home.projects');
    }
}
