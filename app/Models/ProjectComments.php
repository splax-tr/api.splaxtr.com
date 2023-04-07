<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ProjectComments extends Model
{
    use
        HasFactory,
        SoftDeletes,
        Notifiable,
        HasApiTokens;
        
    protected $fillable = [
        'project_id',
        'user_id',
        'comment'
    ];
    protected $table = 'project_comments';
    protected $guarded = [];
    public function find_project_comments()
    {
        return $this->hasMany(
            'App\Models\Project', 
            'user_id', 'id'
        )->select(
            'id', 
            'comment', 
            'is_approved', 
            'parent_id', 
            'blogs_id', 
            'user_id'
        );
    }
}
