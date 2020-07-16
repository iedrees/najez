<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Project extends Model {
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

    public function getImageAttribute($value)
    {
        return isset($value) ? Storage::url($value) : asset('images/021-efficiency.svg');
    }
}
