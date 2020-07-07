<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use http\Client\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class Show extends Component
{
    public $user;
    public $newName;
    public function mount($id)
    {
        $this->user = User::where('id', $id)->firstOrFail();
    }
    public function update($id)
    {
        $newName = (string)Str::of($this->newName)->trim()->substr(0, 100);
        $widget =  User::where('id', $id)->firstOrFail();
        $widget->username = $newName ?? null;
        $widget->save();

    }
//    private function init(User $user)
//    {
//        $this->user = $this->new;
//    }
    public function render()
    {
        return view('livewire.users.show');
    }
}
