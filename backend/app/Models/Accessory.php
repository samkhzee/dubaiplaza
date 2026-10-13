<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'qty_on_hand',
        'cost',
        'rate',
        'reorder_level',
    ];

    protected function casts(): array
    {
        return [
            'qty_on_hand' => 'integer',
            'reorder_level' => 'integer',
            'cost' => 'decimal:2',
            'rate' => 'decimal:2',
        ];
    }
}
