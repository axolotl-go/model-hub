<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'owner_name',
        'card_number',  // Guardamos solo los últimos 4 dígitos
        'card_brand',   // visa | mastercard | amex | other
        'cvv',          // No se guarda el CVV real — lo ignoramos
        'exp_month',
        'exp_year',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** Número enmascarado: **** **** **** 1234 */
    public function getMaskedNumberAttribute(): string
    {
        return '**** **** **** ' . $this->card_number;
    }

    /** Expiración formateada: 04/28 */
    public function getExpiryAttribute(): string
    {
        return str_pad($this->exp_month, 2, '0', STR_PAD_LEFT) . '/' . substr($this->exp_year, -2);
    }

    /** Verifica si ya venció */
    public function getIsExpiredAttribute(): bool
    {
        $expiry = Carbon::createFromDate($this->exp_year, $this->exp_month, 1)->endOfMonth();
        return $expiry->isPast();
    }
}
