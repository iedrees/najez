<?php

namespace App\Actions\Comment;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class GetCommentList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('comments', static::class);
    }
  
    public function rules()
    {
        return [
            'taskId' => ['required', 'exists:tasks,id'],
        ];
    }

    public function handle()
    {
        $task =Task::where('id', $this->taskId)->with('comments.commented')->first();
        return $task->comments;
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Get task comment list', 
            'data' => $result,
        ];
    }
}
