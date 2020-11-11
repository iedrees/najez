<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class ProjectTaskList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('projects/{id}/tasks', static::class);
    }
 
    public function rules()
    {
        return [
            'id' => ['required', 'exists:projects,id'],
        ];
    }

    public function handle()
    {
        return Task::where('project_id', $this->id)
            ->where(function ($w)
            {
                $w->whereHas('assignedUser',  function ($q)
                {
                    $q->where('id', auth()->user()->id);
                })
                ->orWhereHas('project',  function ($q)
                {
                    $q->where('user_id', auth()->user()->id);
                });
            })
            ->with('user', 'assignedUser', 'project')
            ->latest()
            ->get();
 
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Get project task list', 
            'data' => $result,
        ];
    }
}