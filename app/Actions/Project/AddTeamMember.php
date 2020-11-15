<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\ProjectMember;

class AddTeamMember extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->post('projects/{id}/team', static::class);
    }
   
    public function rules()
    {
        return [
            'projectId' => ['required', 'exists:projects,id'],
            'userId' => ['required'],
        ];
    }
 
    public function handle()
    {
        return ProjectMember::firstOrCreate([
            'user_id' => $this->userId,
            'project_id' => $this->projectId,
        ], [
            'rule' => 'member', // todo assign rule 
        ]);
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم إضافة العضو للفريق بنجاح!', 
            'data' => $result ,
        ];
    }
  
}
