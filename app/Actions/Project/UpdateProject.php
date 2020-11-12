<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use App\Models\Project;

class UpdateProject extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->patch('projects/{id}', static::class);
    }

    public function authorize()
    {
        $project =  Project::where('id', $this->id)->first();
        return $project->user_id == auth()->id(); // for now just check for the owner, later for the leader 
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:projects,id'],
            'name' => ['required', 'min:1'],
        ];
    }

    public function handle($id)
    {
        $item =  Project::where('id', $this->id)->first();
        $item->name    = $this->name ?: $item->name;
        $item->save();

        return $item ;
    }
 
    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'تم حفظ إعدادات المشروع بنجاح.', 
            'data' => $result,
        ];
    }
}
