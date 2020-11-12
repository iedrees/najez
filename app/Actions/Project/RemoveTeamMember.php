<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\ProjectMember;

class RemoveTeamMember extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->delete('projects/{id}/team', static::class);
    }
   
    public function rules()
    {
        return [
            'id' => ['required', 'exists:project_members,id'],
        ];
    }
  
    public function handle($id)
    {
        return ProjectMember::where('id', $this->id)->delete();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم إزالة العضو  بنجاح!', 
        ];
    }
    
}
