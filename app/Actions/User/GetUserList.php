<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Action;
use App\Models\User;

class GetUserList extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
               ->prefix('api')
               ->get('users', static::class);
    }
 
    public function handle()
    {
        return User::where('name', 'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%")
                    ->limit(15)->get();
    }

    public function jsonResponse($result, $request)
    {
        return [
            'message' => 'Project list', 
            'data' => $result,
        ];
    }
}
