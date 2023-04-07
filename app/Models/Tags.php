<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Tags extends Model
{
    use
        HasFactory,
        SoftDeletes,
        Notifiable,
        HasApiTokens;

    protected $fillable = [
        'name',
        'description',
        'status'
    ];
    protected $table = 'tags';
    protected $guarded = [];
}
