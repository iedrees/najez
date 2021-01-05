<?php

namespace App\Actions\Report;

use Lorisleiva\Actions\Action;
use View;
use Mpdf\Mpdf;
use App\Models\Task;
use Carbon\Carbon;

class DownloadReport extends Action
{
    public static function routes($router)
    {
        $router->middleware(['web', 'auth'])
      
            ->get('download-report', static::class);
    }
 
    public function handle()
    {
        $this->start = $this->start ?: (string)Carbon::now()->startOfWeek(0)->format('Y-m-d');
        $this->end =  $this->end ?: (string)Carbon::now()->endOfWeek(-3)->format('Y-m-d');

        $tasks = Task::where('done', true)
            ->whereHas('project',  function ($q)
            {
                $q->where('user_id', auth()->user()->id)->orWhereHas('members',  function ($q)
                {
                    $q->where('user_id', auth()->user()->id)->where('rule', 'leader');
                });;
            })
            ->whereBetween('done_at', [$this->start ,$this->end])
            ->with('assignedUser', 'project')->get();
 
        $data = [
            'start' => $this->start,
            'end' => $this->end,
            'tasks' => $tasks
        ];
 
        $view = View::make('pdf.report', $data);
        $html = $view->render();
        $mpdf = new Mpdf(config('pdf'));
        $mpdf->WriteHTML($html);
        $mpdf->Output('najez-report-'.$this->start.'-'.$this->end.'pdf', 'D');
    }
}
