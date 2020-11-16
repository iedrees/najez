<?php

namespace App\Actions\Report;

use App\Models\Task;
use Lorisleiva\Actions\Action;
use Carbon\Carbon;

class GetReportList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->get('report', static::class);
    }

    public function handle()
    {
        $this->start = $this->start ?: (string)Carbon::now()->startOfWeek(0)->format('Y-m-d');
        $this->end =  $this->end ?: (string)Carbon::now()->endOfWeek(-3)->format('Y-m-d');

        return $tasks = Task::where('done', true)
            ->whereHas('project',  function ($q)
            {
                $q->where('user_id', auth()->user()->id)->orWhereHas('members',  function ($q)
                {
                    $q->where('user_id', auth()->user()->id)->where('rule', 'leader');
                });;
            })
            ->whereBetween('done_at', [$this->start ,$this->end])
            ->with('assignedUser', 'project')->get();
    }

    public function jsonResponse($result)
    {
        return [
            'message' => 'Get report task list.',
            'data' => $result,
        ];
    }
}
