<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user;
    public function mount()
    {
        $this->user = User::get();
    }
    public function render()
    {
        return view('livewire.users.edit');
    }
}
