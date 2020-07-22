<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Task extends Model {
    use LogsActivity;

    protected static $logAttributes = ['task', 'user_id', 'done', 'project_id', 'status', 'assigned_user_id'];
    protected static $recordEvents = ['deleted', 'updated', 'created'];
    protected static $logName = 'Task';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Task has been {$eventName}";
    }

    protected $fillable = [
        'task', 'done', 'user_id', 'project_id', 'assigned_user_id',
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
}
