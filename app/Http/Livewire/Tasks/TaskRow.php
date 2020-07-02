<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;

class TaskRow extends Component
{
    public $task;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function checkTask()
    {
        $this->task->done =  !$this->task->done;
        $this->task->save();
    }

    public function render()
    {
        return view('livewire.tasks.task-row');
    }
}
