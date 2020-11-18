<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\Project;

class ArchiveProject extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->delete('projects/{id}', static::class);
    }
 
    public function rules()
    {
        return [
            'id' => ['required', 'exists:projects,id'],
        ];
    }
 
    public function handle($id)
    {
        return Project::where('id', $this->id)->delete();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تمت أرشفة المشروع بنجاح!', 
        ];
    }
    
}
