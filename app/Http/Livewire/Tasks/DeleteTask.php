<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class DeleteTask extends Component
{
    public $task;
 
    public function mount($task)
    {
        $this->task  = $task;
    }

    public function removeTask()
    {
        if($this->task->delete()){
            session()->flash('color', 'green');
            session()->flash('message', 'تمت حذف المهمة بنجاح. ');
            return redirect(route('projects.show', $this->task->project_id));
        }

        session()->flash('color', 'red');
        session()->flash('message', 'حدث خطأ أثناء الحذف، الرجاء المحاولة مرة أخرى.');

    }

    public function render()
    {
        return view('livewire.tasks.delete-task');
    }
}
