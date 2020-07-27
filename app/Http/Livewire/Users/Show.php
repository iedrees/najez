<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
//use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class Show extends Component {
    use WithFileUploads;

    public $user;
    public $image;

    public function mount()
    {
        $this->user = auth()->user()->toArray();
    }

    public function update()
    {
        $this->validate([
            'user.username' => 'required',
            'user.name' => 'required',
            'user.employee_num' => 'required',
            'user.email' => 'required|email',
        ]);

        $user = User::where('id', auth()->user()->id)->firstOrFail();
        $user->username = data_get($this, 'user.username');
        $user->name = data_get($this, 'user.name');
        $user->email = data_get($this, 'user.email');
        $user->employee_num = data_get($this, 'user.employee_num');
        if (isset($this->image))
        {
            $path = $this->image->storeAs('profile/images', time() . '.' . $this->image->extension());
            $user->clearMediaCollection('profile')
                ->addMedia(Storage::path($path))->toMediaCollection('profile');
        }
        $user->save();

        session()->flash('color', 'green');
        session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function render()
    {
        return view('livewire.users.show');
    }
}
