<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\Project;

class ProjectList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('projects', static::class);
    }
 
    public function handle()
    {
        return Project::withCount('tasks', 'doneTasks')
                ->where('user_id', auth()->id()) 
                ->orWhereHas('members', function ($q){
                        $q->where('user_id', auth()->id());
                    })   
                ->with('user', 'members.user')
                ->get();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Project list', 
            'data' => $result,
        ];
    }
}
