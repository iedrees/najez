<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class TaskList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('tasks', static::class);
    }
  
    public function handle()
    {
        return Task::with('user', 'assignedUser', 'project')
            ->latest()
            ->limit(50)
            ->get();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Get task list', 
            'data' => $result,
        ];
    }
}
