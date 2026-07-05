<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable([
    'car_id',
    'maintenance_type',
    'description',
    'cost',
    'start_date',
    'end_date',
    'status',
])]
class Maintenance extends Model
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
            'cost'       => 'decimal:2',
            'start_date' => 'date',
            'end_date'   => 'date',
        ];
    }


    
    public function car(): BelongsTo
    {
        return $this->belongsTo(Car::class);
    }
}
