<?php

namespace App\Enums;

enum LaptopUnitStatus: string
{
    case InStock = 'in_stock';
    case Sold = 'sold';
    case Reserved = 'reserved';

    public function label(): string
    {
        return match ($this) {
            self::InStock => 'In stock',
            self::Sold => 'Sold',
            self::Reserved => 'Reserved',
        };
    }
}
