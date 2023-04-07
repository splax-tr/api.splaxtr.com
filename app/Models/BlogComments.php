<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class BlogComments extends Model
{
    use
        HasFactory,
        SoftDeletes,
        Notifiable,
        HasApiTokens;

    protected $fillable = [
        'blog_id',
        'name',
        'email',
        'comment',
        'status'
    ];
    protected $table = 'blog_comments';
    protected $guarded = [];
    public function find_blog_comments()
    {
        return $this->hasMany(
            'App\Models\Blog', 
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
