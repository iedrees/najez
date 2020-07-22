<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Show extends Component {
    use WithFileUploads;

    public $user;
    public $image;

    // protected $listeners = [
    //     'fileUpload' => 'handleFileUpload',
    // ];

    // public function handleFileUpload($imageData)
    // {
    //     $this->image = $imageData;
    // }

    public function mount()
    {
        $this->user = auth()->user()->toArray();
    }

    public function update()
    {
//        $this->validate([
//            'user.username' => 'required',
//            'user.name' => 'required',
//            'user.email' => 'required|email',
//        ]);

        $user = User::where('id', auth()->user()->id)->firstOrFail();

        $user->addMedia($this->image)->toMediaCollection();

        $user->username = data_get($this, 'user.username');
        $user->name = data_get($this, 'user.name');
        $user->email = data_get($this, 'user.email');
//        $user->image = $this->image->storeAs('profile/images', time() . '.' . $this->image->extension(), 'public');
        $user->save();

        session()->flash('color', 'green');
        session()->flash('message', 'تم التعديل بنجاح.');
    }

    public function render()
    {
        return view('livewire.users.show');
    }
}
