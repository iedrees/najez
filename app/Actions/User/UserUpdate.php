<?php

namespace App\Actions\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Lorisleiva\Actions\Action;

class UserUpdate extends Action
{
    public static function routes($router)
    {
        logger("here we go");
        $router->middleware(['api', 'auth'])->prefix('api')
            ->patch('my-profile', static::class);
    }
//    public function authorize()
//    {
//        logger('on auth');
//        $id=auth()->user()->id;
//        $user =  User::where('id', $id)->first();
//        return $user->id == auth()->id();  ;// for now just check for the owner, later for the leader
//    }
    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return ['name' => ['required', 'min:1'],];
    }

    /**
     * Execute the action and return a result.
     *
     * @return mixed
     */
    public function handle()
    {
        logger('in handelr');
        $id=auth()->user()->id;
        $item =User::where('id', $id)->first();
        logger($item);
        $item->name    = $this->name ?: $item->name;
        $item->username    = $this->username ?: $item->username;
        $item->email    = $this->email ?: $item->email;
        $item->employee_num    = $this->employee_num ?: $item->employee_num;
        $item->employee_ext    = $this->employee_ext ?: $item->employee_ext;
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
        $id=auth()->user()->id;
        $item =  User::where('id', $id)->first();
        logger('in return $result'.$item);
        return [
            'message' => 'تم حفظ إعدادات المشروع بنجاح.',
            'data' => $item,
        ];
    }
}
