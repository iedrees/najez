<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\Task;
use Carbon\Carbon;

class WeekWidget extends Component
{
    public function render()
    {
        $total = Task::where('done', true)
            ->whereBetween('done_at', [Carbon::now()->startOfWeek(0) ,Carbon::now()->endOfWeek(-3)])
            ->whereHas('project',  function ($q)
            {
                $q->where('user_id', auth()->user()->id);
            })
            ->count();

        return view('livewire.reports.week-widget')->with('total', $total);
 
    }
}
