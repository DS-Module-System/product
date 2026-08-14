<?php

namespace App\Enum\Product;

enum ProductMeasure: string
{
    case KG = 'kg';
    case LITER = 'l';
    case PIECE = 'br';
    case SQUARE_METER = 'm2';
    case CUBIC_METER = 'm3';

    public function getLabel(): string
    {
        return match ($this) {
            self::KG => 'kg',
            self::LITER => 'l',
            self::PIECE => 'br',
            self::SQUARE_METER => 'm2',
            self::CUBIC_METER => 'm3',
        };
    }
}
