<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Action;

class GetCurrentUser extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])
                ->prefix('api')
                ->get('user/getCurrentUser', static::class);
    }

    public function authorize()
    {
        return auth()->check();
    }

    public function handle()
    {
        return auth()->user();
    }
}
