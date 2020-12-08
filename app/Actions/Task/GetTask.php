<?php

namespace App\Actions\Task;

//use App\Http\Resources\TaskTransformer;
use Lorisleiva\Actions\Action;
use App\Models\Task;

class GetTask extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->get('tasks/{id}', static::class);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:tasks,id'],
        ];
    }

    public function handle()
    {
        return Task::where('id', $this->id)->with('user', 'project.user', 'project.members.user', 'assignedUser', 'activities.causer', 'comments.commented')->first();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Fetch task data.',
            'data' => $result,
//            'data' => TaskTransformer::collection($result),
        ];
    }
}
