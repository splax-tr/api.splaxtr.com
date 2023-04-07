<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class ProjectCategories extends Model
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
        'image',
        'status'
    ];
    protected $table = 'project_categories';
    protected $guarded = [];
    public function find_projects()
    {
        return $this->hasMany(
            'App\Models\Projects', 
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
