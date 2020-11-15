<?php

namespace App\Actions\Report;

use App\Models\Task;
use Lorisleiva\Actions\Action;

class index extends Action
{
    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
            ->prefix('api')
            ->get('report', static::class);
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::where('done', true)
        ->whereHas('project',  function ($q)
        {
            $q->where('user_id', auth()->user()->id)->append('amILeader');
        })
        ->with('assignedUser', 'project')->get();
        logger('$tasks 2'.$tasks);
        return $tasks = Task::where('done', true)
            ->whereHas('project',  function ($q)
            {
                $q->where('user_id', auth()->user()->id);
            })
            ->with('assignedUser', 'project')->get();
    }
    public function jsonResponse($result)
    {
//        logger("orwhere".$result);
        return [
            'message' => 'Get my task ',
            'data' => $result,
        ];
    }
}

