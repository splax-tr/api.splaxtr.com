<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use
        HasFactory,
        SoftDeletes,
        Notifiable,
        HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function find_roles()
    {
        return $this->hasMany(
            'App\Models\Roles', 
            'role_id', 'id'
        )->select(
            'id',
            'role_id',
            'name', 
            'username', 
            'email', 
            'profile_image', 
            'profile_cover', 
            'profile_bio'
        )->orderBy(
            'created_at', 'desc'
        );
    }
}
