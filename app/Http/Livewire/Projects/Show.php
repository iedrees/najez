<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class Show extends Component
{
    public $project;
    public $addedMessageVisible = false;
    protected $listeners = ['postAdded' => 'showPostAddedMessage'];

    public function mount($id)
    {
        $this->project = Project::where('id', $id)->with('members', 'user')->firstOrFail();
    }
    public function showPostAddedMessage()
    {
        $this->addedMessageVisible = true;
    }

    public function render()
    {
        return view('livewire.projects.show');
    }
}
