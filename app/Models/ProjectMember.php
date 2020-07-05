<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMember extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'rule',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
