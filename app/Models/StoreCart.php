<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoreCart extends Model
{
    protected $fillable = [
    'user_id',
    'threed_id',
];

    public function threed()
    {
        return $this->belongsTo(\App\Models\Threed::class);
    }
}
