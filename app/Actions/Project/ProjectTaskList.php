<?php

namespace App\Actions\Project;

//use App\Http\Resources\TaskTransformer;
use App\Http\Resources\TaskTransformer;
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
        $tasks=Task::where('project_id', $this->id)
            ->where(function ($w)
            {
                $w->whereHas('assignedUser',  function ($q)
                {
                    $q->where('id', auth()->user()->id);
                })
                    ->orWhere(function ($w){
                        $w->orWhereHas('project',  function ($q)
                        {
                            $q->where('user_id', auth()->user()->id)->orWhereHas('members', function ($q) {
                                $q->where('user_id', auth()->user()->id)->where('rule', 'leader')
                                    ->orWhereNull('assigned_user_id');
                        });
                    });
            });
                      })
            ->with('user', 'assignedUser', 'project')
            ->latest()
            ->get();
        return $tasks;

    }

    public function jsonResponse($result, $request)
    {
     
        return [
            'message' => 'Get project task list',
            'data' => TaskTransformer::collection($result),
            'doneTasks' => TaskTransformer::collection(data_get($result->groupBy('done'), '1', [])),
            'notDoneTasks' => TaskTransformer::collection(data_get($result->groupBy('done'), '0', [])),
        ];
    }
}
