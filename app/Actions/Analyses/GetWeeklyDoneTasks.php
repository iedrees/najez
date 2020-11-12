<?php

namespace App\Actions\Analyses;

use Lorisleiva\Actions\Action;
use App\Models\Task;
use Carbon\Carbon;

class GetWeeklyDoneTasks extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('analyses/get-weekly-done-tasks', static::class);
    }
 
    public function handle()
    {
        return Task::where('done', true)
            ->whereBetween('done_at', [Carbon::now()->startOfWeek(0) ,Carbon::now()->endOfWeek(-3)])
            ->whereHas('project',  function ($q)
            {
                $q->where('user_id', auth()->user()->id);
            })
            ->count();  
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'get current user tasks state', 
            'data' => $result,
        ];
    }
}