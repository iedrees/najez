<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function members()
    {
        return $this->hasMany(ProjectMember::class);
    } 
}
