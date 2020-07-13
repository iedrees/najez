<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;

class Settings extends Component {
    public $project;
    public $item;

    public function mount($id)
    {
        $this->project = Project::where('id', $id)->with('members', 'user')->firstOrFail();
        $this->item = $this->project->toArray();
    }

    public function submit()
    {
        $this->validate([
            'item.name' => 'required',
        ]);

        $this->project->name = data_get($this->item, 'name');
        $this->project->status = data_get($this->item, 'status');
        $this->project->details = data_get($this->item, 'details');
        $this->project->save();

        session()->flash('color', 'green');
        session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function render()
    {
        return view('livewire.projects.settings');
    }
}
