<?php

namespace App\Http\Livewire\Home;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Project;

class Projects extends Component {
    public $items = [];
    public $days_between;
    public $length;
    public $project;

    public function mount()
    {
        $this->items = Project::withCount('tasks', 'doneTasks')->get();
    }
//    public function date_deadline($id){
//        $officialDate = Carbon::now()->toDateString();
//        $this-> project = Project::where('id',$id);
//        $end_date1 = $this->project->get('deadline')->toArray();
//        logger($end_date1);
//        $end_date = $end_date1[0]['deadline'] ;
//        //$start_date = \Carbon\Carbon::createFromFormat('Y-m-d',$officialDate);
//        // $end_date = \Carbon\Carbon::createFromFormat('Y-m-d',$end_date);
//        // $different_days = $start_date->diffInDays($end_date);
//        $start = strtotime($officialDate);
//        $end = strtotime($end_date);
//        $days_between = ($end - $start) / 86400 ;
//        // $months_between = ceil(($end - $start) / 2592000 );
//        ///$years_between = ceil(($end - $start) / 31536000 );
////        return $days_between ;
//    }
//    public function diff($id)
//    {
//        $this->project = Project::where('id', $id);
//        $end = Carbon::parse($this->project->deadline);
//        $now = Carbon::now();
//        $length = $end->diffInDays($now);
//        logger($length);
//      return $length;
//    }

    public function render()
    {
        return view('livewire.home.projects');
    }
}
