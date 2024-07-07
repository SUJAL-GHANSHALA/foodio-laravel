<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait; 

class UserDetail extends Model
{
    use HasFactory, SpatialTrait;

    protected $fillable = [
        'user_d',
        'location',
        'image'
    ];

    protected $spatialFields = [
        'location'
    ];

    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}