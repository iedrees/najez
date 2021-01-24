<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\Project;

class GetProject extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->get('projects/{id}', static::class);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:projects,id'],
        ];
    }

    public function handle()
    {
        return Project::where('id', $this->id)
                ->where(function ($query)
                {
                    $query->where('user_id', auth()->id())
                        ->orWhereHas('members', function ($q){
                            $q->where('user_id', auth()->id());
                        });
                })
                ->with('user','members.user')
                ->withCount('tasks', 'doneTasks')
                ->first();
    }


    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Fetch Project data.',
            'data' => $result,
        ];
    }
}
