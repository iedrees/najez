<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Action;

class UserUpdate extends Action
{
    public static function routes($router)
    {
        $router->middleware(['api', 'auth'])->prefix('api')
            ->patch('my-profile', static::class);
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:1'],
        ];
    }

    public function handle()
    {
        logger('in handelr');


        $item = User::where('id', auth()->id())->first();

        $item->name    = $this->name ?: $item->name;
        $item->username    = $this->username ?: $item->username;
        $item->email    = $this->email ?: $item->email;
        $item->employee_num    = $this->employee_num ?: $item->employee_num;
        $item->employee_ext    = $this->employee_ext ?: $item->employee_ext;
        $item->save();

        return $item ;
    }

    public function jsonResponse($result, $request)
    {
        $id=auth()->user()->id;
        $item =  User::where('id', $id)->first();
        logger('in return $result'.$item);
        return [
            'message' => 'تم حفظ بيانات الملف الشخصي بنجاح.',
            'data' => $item,
        ];
    }
}
