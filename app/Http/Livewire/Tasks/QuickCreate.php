<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class QuickCreate extends Component
{
    public $task;
    public $projectid;

    public function mount($projectid)
    {
        $this->projectid = $projectid;
    }

    public function submit()
    {
 
        $this->validate([
            'task' => 'required',
        ]);
 
        Task::create([
            'task' => $this->task,
            'project_id' => $this->projectid,
            'user_id' => auth()->user()->id,
        ]);
        
        $this->task = '';
        $this->emit('taskAdded');

    }

    public function render()
    {
        return view('livewire.tasks.quick-create');
    }
}
