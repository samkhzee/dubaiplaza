<?php

namespace App\Models;

use App\Enums\LaptopUnitStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LaptopUnit extends Model
{
    protected $fillable = [
        'supplier_lot_id',
        'brand',
        'model',
        'cpu',
        'ram',
        'storage',
        'serial',
        'cost',
        'rate',
        'condition_note',
        'status',
        'notes',
        'search_text',
    ];

    protected function casts(): array
    {
        return [
            'cost' => 'decimal:2',
            'rate' => 'decimal:2',
            'status' => LaptopUnitStatus::class,
        ];
    }

    protected static function booted(): void
    {
        static::saving(function (LaptopUnit $unit): void {
            $unit->search_text = self::buildSearchText($unit);
        });
    }

    public static function buildSearchText(LaptopUnit $unit): string
    {
        return mb_strtolower(implode(' ', array_filter([
            $unit->brand,
            $unit->model,
            $unit->cpu,
            $unit->ram,
            $unit->storage,
            $unit->serial,
            $unit->condition_note,
        ])));
    }

    public function supplierLot(): BelongsTo
    {
        return $this->belongsTo(SupplierLot::class);
    }

    public function displayName(): string
    {
        $parts = array_filter([$this->brand, $this->model]);

        return implode(' ', $parts) ?: $this->model;
    }
}
