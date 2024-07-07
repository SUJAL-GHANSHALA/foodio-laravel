<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'meal_id',
        'buyer_id',
        'pickup_window_start',
        'pickup_window_end',
        'status',
        'collection_code',
    ];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function buyer()
    {
        return $this->belongsTo(User::class);
    }
}

