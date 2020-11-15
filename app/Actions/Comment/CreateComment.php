<?php

namespace App\Actions\Comment;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class CreateComment extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->post('comments', static::class);
    }

    public function rules()
    {
        return [
            'taskId' => ['required', 'exists:tasks,id'],
            'comment' => ['required'],
        ];
    }
 
    public function handle()
    {
        $task =Task::where('id', $this->taskId)->first();
        auth()->user()->comment($task, $this->comment);
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم إضافة تعليقك بنجاح!', 
            // 'data' => $result ,
        ];
    }
  
}
