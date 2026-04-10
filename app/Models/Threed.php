<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Threed extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'tags',
        'file_path',
        'preview_image',
        'user_id',
    ];
}
