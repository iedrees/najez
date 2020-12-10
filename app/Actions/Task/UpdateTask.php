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
        $item->task         = $this->task ?: $item->task;
        // $item->start_date   = $this->start_date ?: $item->start_date;
        $item->end_date     = $this->end_date ?: $item->end_date;
        $item->due_date     = $this->end_date ?: $item->end_date;
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
