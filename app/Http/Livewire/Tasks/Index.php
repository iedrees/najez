<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class Index extends Component
{
    public $tasks;
    public $project;
    public $projectid;

    protected $listeners = ['taskAdded' => 'refresh'];

    public function mount($id, $project)
    {
        $this->project = $project;
        $this->projectid = $id;
        $this->refresh();
    }

    public function refresh()
    {
        $this->tasks = Task::where('project_id', $this->projectid)->with('user', 'activities')->latest()->get();
    }

    public function render()
    {
        return view('livewire.tasks.index');
    }
}
