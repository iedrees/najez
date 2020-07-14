<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Task extends Model {
    use LogsActivity;

    protected static $logAttributes = ['task', 'user_id', 'done', 'project_id', 'status'];
    protected static $recordEvents = ['deleted', 'updated', 'created'];
    protected static $logName = 'Task';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "This Task has been {$eventName}";
    }

    protected $fillable = [
        'task', 'done', 'user_id', 'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
