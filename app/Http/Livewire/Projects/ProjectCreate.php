<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class ProjectCreate extends Component {
    public $name;
 
    public function submit()
    {
        $this->validate([
            'name' => 'required|min:2',
        ]);

        $project = Project::create([
            'name' => $this->name,
            'user_id' => auth()->user()->id,
        ]);

        session()->flash('color', 'green');
        session()->flash('message', 'تمت إضافة المشروع بنجاح.');
        $this->redirect(route('projects.show', $project->id));
    }

    public function render()
    {
        return view('livewire.projects.project-create');
    }
}
