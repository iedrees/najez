<?php

namespace App\Actions\Project;

use Illuminate\Support\Facades\Storage;
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
        logger('in project');
        $item =  Project::where('id', $this->id)->first();
        $item->name    = $this->name ?: $item->name;
        $item->status    = $this->status ?: $item->status;
        $item->details    = $this->details ?: $item->details;
        $item->deadline    = $this->deadline ?: $item->deadline;
//        if (isset($item->image)) {
//            $path = $item->image->storeAs('upload/images', time() . '.' . $item->image->extension());
//            $item->clearMediaCollection('upload')
//                ->addMedia(Storage::path($path))->toMediaCollection('upload');
//
//        }
        $item->save();

        return $item ;
    }

    public function jsonResponse($result, $request)
    {

        logger('in return $result'.$result);
        return [
            'message' => 'تم حفظ إعدادات المشروع بنجاح.',
            'data' => $result,
        ];
    }
}
