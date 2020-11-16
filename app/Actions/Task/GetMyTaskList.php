<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class GetMyTaskList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('my-task-list', static::class);
    }

    public function handle()
    {
        return Task::
//        where('assigned_user_id', auth()->user()->id)
//            ->orWhere('user_id', auth()->user()->id)
//            ->
            with('project', 'user','assignedUser')
            ->orderBy('created_at', 'desc')
            ->paginate(100);
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Get my task list',
            'data' => $result,
            'allMyDoneTasks'    => auth()->user()->allMyDoneTasks->count(),
            'allMyNotDoneTasks'    => auth()->user()->allMyNotDoneTasks->count(),
        ];
    }
}
