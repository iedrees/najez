<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class CreateTask extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->post('tasks', static::class);
    }

   
    public function rules()
    {
        return [
            'projectId' => ['required', 'exists:projects,id'],
            'task' => ['required', 'min:2'],
        ];
    }
 
    public function handle()
    {
        $item = new Task();
        $item->user_id    = auth()->user()->id;
        $item->assigned_user_id    = auth()->user()->id;
        $item->project_id  = $this->projectId;
        $item->task     = $this->task;
        $item->save();
 
        return $item;
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Task created sucessfuly!', 
            'data' => $result ,
        ];
    }
  
}
