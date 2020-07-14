<?php

namespace App\Http\Livewire\Home;

use App\Models\Project;
use App\Models\Task;
use Livewire\Component;

class Home extends Component {
    public function render()
    {
        return view('livewire.home.home');
    }
}
