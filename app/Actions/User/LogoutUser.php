<?php

namespace App\Actions\User;

use Lorisleiva\Actions\Action;

class LogoutUser extends Action
{
    public function handle()
    {
        auth()->logout();

        return redirect(url('/'));    
    }
}
