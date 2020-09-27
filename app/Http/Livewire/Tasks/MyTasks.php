<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\Task;

class MyTasks extends Component
{
    public $myNotDoneTasksCount;

    protected $listeners = ['taskUpdated' => 'taskUpdated'];

    public function mount()
    {


        $this->myNotDoneTasksCount = auth()->user()->allMyNotDoneTasks->count();
    }

    public function taskUpdated($taskId)
    {
        $this->myNotDoneTasksCount = auth()->user()->allMyNotDoneTasks->count();
    } 

    public function render()
    {
        $tasks = Task::where('assigned_user_id', auth()->user()->id)
            // ->orWhere('user_id', auth()->user()->id)
            ->with('project', 'user')
            ->orderBy('created_at', 'desc')
            ->paginate(60);

        return view('livewire.tasks.my-tasks')->with('tasks', $tasks);
    } 
}
