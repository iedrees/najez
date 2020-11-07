<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Actuallymab\LaravelComment\CanComment;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, CanComment ,InteractsWithMedia;

    protected $fillable = [
        'name', 'email', 'password','username',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute()
    {
        return "" !== $this->getFirstMediaUrl('profile')  ? $this->getFirstMediaUrl('profile'): asset('images/user.png');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function getAllMyTasksAttribute()
    {
        return $this->hasMany(Task::class, 'assigned_user_id');
    }

    public function getAllMyDoneTasksAttribute()
    {
        return $this->hasMany(Task::class, 'assigned_user_id')->where('done', true);
    }

    public function getAllMyNotDoneTasksAttribute()
    {
        return $this->hasMany(Task::class, 'assigned_user_id')->where('done', false);
    }
}
