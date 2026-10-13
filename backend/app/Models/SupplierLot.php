<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SupplierLot extends Model
{
    protected $fillable = [
        'reference',
        'supplier_name',
        'notes',
        'imported_at',
    ];

    protected function casts(): array
    {
        return [
            'imported_at' => 'datetime',
        ];
    }

    public function laptopUnits(): HasMany
    {
        return $this->hasMany(LaptopUnit::class);
    }
}
