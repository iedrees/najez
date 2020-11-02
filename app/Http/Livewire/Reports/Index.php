<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;

class Index extends Component
{
    public $start;
    public $end;
 
    public function mount()
    {
        $this->start = (string)Carbon::now()->startOfWeek(0)->format('Y-m-d');
        $this->end = (string)Carbon::now()->endOfWeek(-3)->format('Y-m-d');
    }
 
    public function setDates($start, $end)
    {
        $this->start = $start;
        $this->end = $end;
    }
 
    public function render()
    {
        $tasks = Task::where('done', true)
                    ->whereHas('project',  function ($q)
                    {
                        $q->where('user_id', auth()->user()->id);
                    })
                    ->whereBetween('done_at', [$this->start ,$this->end])
                    ->with('assignedUser', 'project')->get();
                    
        return view('livewire.reports.index')->with('tasks', $tasks)->extends('layouts.app');
    }
}
