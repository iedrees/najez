<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;

class TaskRow extends Component
{
    public $task;
    public $project;
    public $taskContent;
    public $details;
    public $start_date;
    public $end_date;

    protected $listeners = ['taskAssigned' => 'updateTaskInfo'];

    public function mount($task, $project)
    {
        $this->task = $task;
        $this->project = $project;
        $this->taskContent = $task->task;
        $this->details = $task->details;
        $this->start_date = $task->start_date;
        $this->end_date = $task->end_date;
        logger('mount');
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
    public function addingNote()
    {
        $this->task->details=$this->details ;
        $this->task->start_date=$this->start_date ;
        $this->task->end_date=$this->end_date ;
        if($this->task->save()){
            session()->flash('color', 'green');
            session()->flash('message', 'تم اضافة الملاحظات  بنجاح. ');
            return redirect(route('projects.show', $this->task->project_id));
        }
    }

    public function render()
    {
        return view('livewire.tasks.task-row');
    }
}
