<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class SetTaskDoneStatus extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->post('tasks/{id}/set-done-status', static::class);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:tasks,id'],
            'done' => ['required'],
        ];
    }

    public function handle($id)
    {
        $item =  Task::where('id', $this->id)->firstOrFail();
        $item->done    = $this->done;
        $item->save();

        return $item;
    }
 
    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Task updated sucessfuly!', 
            'data' => $result,
        ];
    }
}
