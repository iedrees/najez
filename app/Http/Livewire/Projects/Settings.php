<?php

namespace App\Http\Livewire\Projects;

use App\Models\ProjectMember;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Storage;
use Livewire\Component;
use App\Models\Project;
use Livewire\WithFileUploads;

class Settings extends Component
{
    use WithFileUploads;

    public $image;
    public $project;
    public $item;
    public $search = null;


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
        $this->project->leader_id = data_get($this->item, 'leader_id');

        if (isset($this->image)) {
            $path = $this->image->storeAs('upload/images', time() . '.' . $this->image->extension());
            $this->project->clearMediaCollection('upload')
                ->addMedia(Storage::path($path))->toMediaCollection('upload');
        }
        $this->project->save();

        session()->flash('color', 'green');
        session()->flash('message', 'تم التعديل بنجاح.');

    }

    public function addLeader($user)
    {
        $this->project->leader_id = $user['id'];
        $this->project->save();
        ProjectMember::firstOrCreate([
            'user_id' => $user['id'],
            'project_id' => $this->project->id,
        ], [
            'rule' => 'قائد',
        ]);
    }

    public function removeProject($id)
    {
        Project::where('id', $id)->delete();
        session()->flash('color', 'green');
        session()->flash('message', 'تمت ازالة المشروع بنجاح. ');
        $this->redirect(route('home'));


    }


    public function render()
    {
        return view('livewire.projects.settings', [
            'users' => User::where('id', '!=', $this->project->user_id)
                ->where(function ($q) {
                    $q->where('name', 'LIKE', "%{$this->search}%")
                        ->orWhere('email', 'LIKE', "%{$this->search}%");
                })->limit(10)->get(),
        ])->extends('layouts.app');
    }
}
