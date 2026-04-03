<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class storeCart extends Model
{
    protected $fillable = [
        'user_id',
        'model_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function model3d()
    {
        return $this->belongsTo(Model3D::class);
    }
}
