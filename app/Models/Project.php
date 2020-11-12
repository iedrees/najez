<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia, SoftDeletes;

    protected $fillable = [
        'id', 'name', 'user_id', 'image', 'deadline','deleted_at',
    ];

    protected $appends = [
        'amILeader'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leader()
    {
        return $this->belongsTo(User::class);
    }

    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    }

    public function getAmILeaderAttribute()
    {
        $leaders = $this->members()->where('rule', 'leader')->get()->keyBy('user_id')->keys();
        $leaders->push($this->user_id); // add the owner to the leaders array by default 

        // return true if current user is one of the leaders
        return in_array(auth()->id(), $leaders->toArray());
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

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
        return "" !== $this->getFirstMediaUrl('upload')  ? $this->getFirstMediaUrl('upload'): asset('images/021-efficiency.svg');
    }
}
