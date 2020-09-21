<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use Carbon\Carbon;

class MyTaskRow extends Component
{
    public $task;

    public function mount($task)
    {
        $this->task = $task;
    }

    public function checkTask()
    {
        $this->task->done =  !$this->task->done;
        $this->task->done_at =  Carbon::now();
        $this->task->save();

        $this->emit('taskUpdated', $this->task->id);
    }

    public function render()
    {
        return view('livewire.tasks.my-task-row');
    }
}
