<?php

namespace App\Actions\Task;

use Lorisleiva\Actions\Action;
use App\Models\Task;

class DeleteTask extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->delete('tasks/{id}', static::class);
    }
 
    public function rules()
    {
        return [
            'id' => ['required', 'exists:tasks,id'],
        ];
    }
 
    public function handle($id)
    {
        return Task::where('id', $this->id)->delete();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم حذف المهمة بنجاح!', 
        ];
    }
    
}
