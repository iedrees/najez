<?php

namespace App\Http\Livewire\Home;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class Home extends Component {
    public $project;
    public $countTask= '';
    public $countDoneTask= '';

    public function countTasks($project_id)
    {
        $countTask = Task::where('project_id', $project_id)->count();
        //dd($countTask);
    }

    public function countDoneTasks($project_id)
    {
        $countDoneTask = Task::where('project_id', $project_id)->where('done', '1')->count();

    }

    public function render()
    {
        return view('livewire.home.home');
    }
}
