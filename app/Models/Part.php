<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'image_url',
        'downforce_impact', 'top_speed_impact', 'acceleration_impact', 'price'
    ];
}
