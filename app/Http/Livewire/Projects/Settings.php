<?php

namespace App\Http\Livewire\Projects;

use Storage;
use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;

class Settings extends Component {
    use WithFileUploads;

    public $image;
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
        $this->project->deadline = data_get($this->item, 'deadline');
        logger($this->project->image);
        if (isset($this->image))
        {
            $path = $this->image->storeAs('upload/images', time() . '.' . $this->image->extension());
            $this->project->clearMediaCollection('upload')
                ->addMedia(Storage::path($path))->toMediaCollection('upload');

        }
        $this->project->save();

        session()->flash('color', 'green');
        session()->flash('message', 'تم التعديل بنجاح.');
//        dd($this->project->image);
    }


    public function render()
    {
        return view('livewire.projects.settings');
    }
}
