<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class BlogsCategories extends Model
{
    use
        HasFactory,
        SoftDeletes,
        Notifiable,
        HasApiTokens;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status'
    ];
    protected $table = 'blogs_categories';
    protected $guarded = [];
    public function find_blogs()
    {
        return $this->hasMany(
            'App\Models\Blog', 
            'category_id', 'id'
        )->select(
            'id', 
            'title', 
            'excerpt', 
            'content', 
            'cover_image_path', 
            'slug', 
            'meta_data',
            'is_archived',
            'is_published',
            'views',
            'user_id',
            'category_id'
        );
    }
}
