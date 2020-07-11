<?php

namespace App\Http\Livewire\Projects;

use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class ProjectCreate extends Component
{
    public $name ;
//  public $user;
    public $user_id;


//    public function mount()
//    {
//      //  $this->$user_id ='1;
//    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
        ]);

        Project::create([
            'name' => $this->name,
            //'user_id' =>$user['id'],
            //'user_id' =>$user_id ,
            'user_id' => auth()->user()->id,

        ]);

        session()->flash('color', 'green');
        session()->flash('message', 'تمت إضافة المشروع بنجاح.');

    }

    public function render()
    {
        return view('livewire.projects.project-create');
    }
}
