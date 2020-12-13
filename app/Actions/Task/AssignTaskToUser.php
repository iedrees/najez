<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class AssignTaskToUser extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->post('assign-task-to-user', static::class);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:tasks,id'],
        ];
    }

    public function handle($id)
    {
        $task = Task::where('id', $this->id)->first();
        $task->assigned_user_id = $this->assigned_user_id;
        $task->save();
        return $task;
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم تعيين المهمة بنجاح.',
            // 'data' => $result->assignedUser ,
        ];
    }

}
