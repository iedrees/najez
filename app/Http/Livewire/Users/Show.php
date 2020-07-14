<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Show extends Component {
    public $user;
 
    public function mount()
    {
        $this->user = auth()->user()->toArray();
    }

    public function update()
    {
        $this->validate([
            'user.username' => 'required',
            'user.name' => 'required',
            'user.email' => 'required|email',
        ]);

        $user = User::where('id', auth()->user()->id)->firstOrFail();
        $user->username = data_get($this, 'user.username');
        $user->name     = data_get($this, 'user.name');
        $user->email    = data_get($this, 'user.email');
        $user->save();

        session()->flash('color', 'green');
        session()->flash('message', 'تم التعديل بنجاح.');
    }
    
    public function render()
    {
        return view('livewire.users.show');
    }
}
