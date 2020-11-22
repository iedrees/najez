<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Traits\LogsActivity;
use Actuallymab\LaravelComment\Contracts\Commentable;
use Actuallymab\LaravelComment\HasComments;

class Task extends Model implements Commentable {
    use LogsActivity, HasComments;

    protected static $logAttributes = ['task', 'user_id', 'done', 'project_id', 'status','assigned_user_id'];
    protected static $recordEvents = ['deleted', 'updated', 'created'];
    protected static $logName = 'Task';

   protected $appends = ['since'];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Task has been {$eventName}";
    }

    public function canBeRated(): bool
    {
        return true; // default false
    }

    protected $fillable = [
        'task', 'done', 'user_id', 'project_id', 'assigned_user_id','details',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function assignedUser()
    {
        return $this->belongsTo(User::class, 'assigned_user_id');
    }

    public function getSinceAttribute()
    {
        return $this->created_at->diffForHumans();
    }
}
