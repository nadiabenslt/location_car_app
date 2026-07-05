<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

#[Fillable([
    'user_id',
    'car_id',
    'pickup_date',
    'return_date',
    'pickup_location',
    'return_location',
    'total_days',
    'daily_price',
    'total_price',
    'status',
    'notes',
    'confirmed_at',
    'cancelled_at',
])]
class Reservation extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'pickup_date'  => 'date',
            'return_date'  => 'date',
            'daily_price'  => 'decimal:2',
            'total_price'  => 'decimal:2',
            'total_days'   => 'integer',
            'confirmed_at' => 'datetime',
            'cancelled_at' => 'datetime',
        ];
    }

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }

    
    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
