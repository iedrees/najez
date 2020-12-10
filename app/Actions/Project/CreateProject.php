<?php

namespace App\Actions\Project;

use Lorisleiva\Actions\Action;
use Carbon\Carbon;
use App\Models\Project;

class CreateProject extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->post('projects', static::class);
    }

    public function rules()
    {
        return [
            'name' => ['required'],
        ];
    }

    public function handle()
    {

        $countProjects = Project::where('user_id', auth()->user()->id)->count();


        if($countProjects >= 20) {
            return 'Creating Limit';
        }
        $item = new Project();
        $item->name     = $this->name;
        $item->user_id     = auth()->user()->id;
        $item->deadline     = Carbon::now()->addDays(12);
        $item->save();

        return $item;
    }

    public function jsonResponse($result, $request)
    {
        if($result == 'Creating Limit'){
            return response()->json([
                'message' => 'لا يمكن انشاء اكثر من ٢٠ مشروع ',
            ], 400);
        }

        return [
            'message' => 'تم انشاء المشروع بنجاح!',
            'data' => $result,
        ];
    }
}
