<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    protected $fillable = ['user_id', 'name', 'part_ids', 'total_downforce', 'total_top_speed', 'lap_time'];
    protected $casts = ['part_ids' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
