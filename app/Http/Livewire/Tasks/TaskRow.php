<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class TaskRow extends Component
{
    public $task;
    public $project;

    protected $listeners = ['taskAssigned' => 'updateTaskInfo'];

    public function mount($task, $project)
    {
        $this->task = $task;
        $this->project = $project;
    }

    public function checkTask()
    {
        $this->task->done =  !$this->task->done;
        $this->task->save();
    }

    public function updateTaskInfo($taskid)
    {
        $this->task = Task::where('id', $taskid)->with('user', 'assignedUser', 'activities')->first();
    }

    public function render()
    {
        return view('livewire.tasks.task-row');
    }
}
