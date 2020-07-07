<?php

namespace App\Http\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\User;
use App\Models\ProjectMember;

class Members extends Component
{
    public $project;
    public $projectId;
    public $search = null;
 
    public function mount($id)
    {
        $this->projectId = $id;
        $this->getData();
    }
 
    public function addMember($user)
    {
        ProjectMember::firstOrCreate([
            'user_id' => $user['id'],
            'project_id' => $this->project->id,
        ], [
            'rule' => 'member', // todo assign rule 
        ]);
 
        session()->flash('color', 'green');
        session()->flash('message', 'تمت إضافة العضو للفريق بنجاح.');

        $this->getData();
    }
 
    public function removeMember($id)
    {
        ProjectMember::where('id', $id)->delete();
 
        session()->flash('color', 'green');
        session()->flash('message', 'تمت ازالة العضو من المشروع بنجاح. ');

        $this->getData();
    }

    protected function getData()
    {
        $this->project = Project::where('id', $this->projectId)->with('members', 'user')->firstOrFail();
    }

    public function render()
    {
  
        return view('livewire.projects.members', [
            'users' => User::where('id', '!=', $this->project->user_id)
                            ->where(function ($q)
                                {
                                    $q->where('name', 'LIKE', "%{$this->search}%")
                                        ->orWhere('email', 'LIKE', "%{$this->search}%");
                                })->limit(10)->get(),
        ]);
    }
}
