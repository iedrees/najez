<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;

class TaskRow extends Component
{
    public $task;
    public $project;
    public $taskContent;

    protected $listeners = ['taskAssigned' => 'updateTaskInfo'];

    public function mount($task, $project)
    {
        $this->task = $task;
        $this->project = $project;
        $this->taskContent = $task->task;
    }
 

    public function update()
    {
        $this->task->task = $this->taskContent;
        if($this->task->save()){
            session()->flash('color', 'green');
            session()->flash('message', 'تم تعديل المهمة  بنجاح. ');
            return redirect(route('projects.show', $this->task->project_id));
        }
 

        $this->emit('taskUpdated', $this->task->id);
    }

    public function checkTask()
    {
        $this->task->done =  !$this->task->done;
        $this->task->done_at =  Carbon::now();
        $this->task->save();
    }

    public function updateTaskInfo($taskid)
    {
        // $this->task = Task::where('id', $taskid)->with('user', 'assignedUser', 'activities')->first();
    }

    public function render()
    {
        return view('livewire.tasks.task-row');
    }
}
