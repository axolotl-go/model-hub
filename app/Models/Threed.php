<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threed extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'tags',
        'file_path',
        'preview_image',
        'user_id',
        'enabled',
    ];

    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function purchases()
    {
        return $this->hasMany(Purchase::class);
    }

    public function isPurchasedBy($userId)
    {
        return Purchase::where('user_id', $userId)
            ->where('threed_id', $this->id)
            ->exists();
    }

    public function isInCartOf($userId)
    {
        return StoreCart::where('user_id', $userId)
            ->where('threed_id', $this->id)
            ->exists();
    }
}
