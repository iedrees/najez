<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Project extends Model implements HasMedia
{
    use HasMediaTrait;
    protected $fillable = [
        'id', 'name', 'user_id', 'image', 'deadline',
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

    /// i add this
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function doneTasks()
    {
        return $this->hasMany(Task::class)->where('done', true);
    }

    public function getImageAttribute()
    {
        return "" !== $this->getFirstMediaUrl('uplaod')  ? $this->getFirstMediaUrl('uplaod'): asset('images/efficiency.svg');
    }
}
