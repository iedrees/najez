<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class UpdateTask extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->patch('tasks/{id}', static::class);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:tasks,id'],
            'task' => ['required', 'min:1'],
        ];
    }

    public function handle($id)
    {
        $item =  Task::where('id', $this->id)->first();
        $item->task    = $this->task ?: $item->task;
        $item->save();

        return $item ;
    }
 
    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم حفظ المهمة بنجاح.', 
            'data' => $result,
        ];
    }
}
