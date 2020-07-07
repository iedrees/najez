<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class ProjectCreate extends Component
{
    public $project_name ;
    public $name  = '';



    public function submit()
    {
//        $this->validate([
//            'name' => 'required',
//        ]);

        Project::create([
            'project_name' => $this->name,
            'user_id' => auth()->user()->id,
        ]);

        $this->name = '';
//        $this->emit('projectAdd');
    }
    public function render()
    {
        return view('livewire.projects.project-create');
    }
}
