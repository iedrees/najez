<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;

class Project extends Model
{
    protected $fillable = [
        'name','user_id','image'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function doneTasks()
    {
        return $this->hasMany(Task::class)->where('done', true);
    }

    public function getImageAttribute($value)
    {
        return  isset($value)? Storage::url($value): asset('images/021-efficiency.svg');
    }

}
