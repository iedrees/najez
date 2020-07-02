<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class Index extends Component
{
    public $tasks;
    public $projectid;

    protected $listeners = ['taskAdded' => 'refresh'];

    public function mount($id)
    {
        $this->projectid = $id;
        $this->tasks = Task::where('project_id', $id)->latest()->get();
    }

    public function refresh()
    {
        $this->tasks = Task::where('project_id', $this->projectid)->latest()->get();
    }

    public function render()
    {
        return view('livewire.tasks.index');
    }
}
