<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Show extends Component {
    public $user;
    public $newName;
    public $Name;
    public $email;
    public $password;

    public function mount($id)
    {
        $this->user = User::where('id', $id)->firstOrFail();
    }

    public function update($id)
    {
        $widget = User::where('id', $id)->update([
            'username' => $this->newName ?? $this->user->username,
            'name' => $this->Name ?? $this->user->name,
            'email' => $this->email ?? $this->user->email,
            'password' => $this->password ?? $this->user->password,
        ]);

    }
    public function render()
    {
        return view('livewire.users.show');
    }
}
