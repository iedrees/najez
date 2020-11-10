<?php

namespace App\Actions;

use Lorisleiva\Actions\Action;

class WebApp extends Action
{
    public function authorize()
    {
        return auth()->check();
    }
 
    public function handle()
    {
        return view('webapp');
    }
}
