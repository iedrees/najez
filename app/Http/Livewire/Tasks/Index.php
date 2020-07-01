<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class Index extends Component
{
    public $tasks;

    public function mount($id)
    {
        $this->tasks = Task::where('project_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.tasks.index');
    }
}
