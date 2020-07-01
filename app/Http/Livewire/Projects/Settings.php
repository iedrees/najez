<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class Settings extends Component
{
    public $project;

    public function mount($id)
    {
        $this->project = Project::where('id', $id)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.projects.settings');
    }
}
