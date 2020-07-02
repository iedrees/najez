<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task', 'done', 'user_id', 'project_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
