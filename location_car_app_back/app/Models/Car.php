<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'category_id',
    'brand',
    'model',
    'year',
    'color',
    'license_plate',
    'vin',
    'fuel_type',
    'transmission',
    'seats',
    'doors',
    'daily_price',
    'mileage',
    'status',
    'description',
])]
class Car extends Model
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
            'daily_price' => 'decimal:2',
            'year'        => 'integer',
            'seats'       => 'integer',
            'doors'       => 'integer',
            'mileage'     => 'integer',
        ];
    }

    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    
    public function images(): HasMany
    {
        return $this->hasMany(CarImage::class);
    }

    
    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    
    public function maintenances(): HasMany
    {
        return $this->hasMany(Maintenance::class);
    }
}
