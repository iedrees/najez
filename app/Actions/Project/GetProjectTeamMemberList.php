<?php

namespace App\Actions\Project;

use App\Http\Resources\TeamTransformer;
use Lorisleiva\Actions\Action;
use App\Models\Project;

class GetProjectTeamMemberList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('projects/{id}/team', static::class);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:projects,id'],
        ];
    }

    public function handle()
    {
        $project = Project::where('id', $this->id)->with('members', 'user')->first();
        return $project->members()->with('user')->get();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Get project team members',
//            'data' => $result,
            'data' => TeamTransformer::collection($result),
        ];
    }
}
