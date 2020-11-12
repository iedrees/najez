<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\ProjectMember;

class SetTeamMemberRule extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->post('projects/{id}/team/set-team-member-rule', static::class);
    }
   
    public function rules()
    {
        return [
            // 'projectId' => ['required', 'exists:projects,id'],
            'id' => ['required'],
            'rule' => ['required'],
        ];
    }
 
    public function handle()
    {
        $item = ProjectMember::where('id', $this->id)->first();
        $item->rule = $this->rule;
        $item->save();

        return $item;
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم تغيير صلاحية العضو لهذا الفريق.', 
            'data' => $result ,
        ];
    }
  
}
