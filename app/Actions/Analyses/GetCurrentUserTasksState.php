<?php

namespace App\Actions\Analyses;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class GetCurrentUserTasksState extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('analyses/get-current-user-tasks-state', static::class);
    }
 
    public function handle()
    {
     
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'get current user tasks state', 
            'data' => [
                'allMyTasksCount'   => auth()->user()->allMyTasks->count(),
                'allMyDoneTasks'    => auth()->user()->allMyDoneTasks->count(),
                'allMyNotDoneTasks'    => auth()->user()->allMyNotDoneTasks->count(),
            ] 
        ];
    }
}