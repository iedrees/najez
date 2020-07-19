<?php

namespace App\Http\Livewire\Tasks;

use Livewire\Component;
use App\Models\User;

class AssignUser extends Component
{
    public $search = null;
    public $task;
    public $project;

    public function mount($task, $project)
    {
        $this->task  = $task;
        $this->project  = $project;
    }

    public function assignMember($user, $task)
    {
        $this->task->assigned_user_id = $user['id'];
        $this->task->save();
    }

    public function render()
    {
        return view('livewire.tasks.assign-user');
    }
}
