<?php

namespace App\Enum;

enum Rarity: int
{
    case THREE_STAR = 3;
    case FOUR_STAR = 4;
    case FIVE_STAR = 5;
    
    public function label(): string
        {
            return match ($this) {
                self::THREE_STAR => '3★',
                self::FOUR_STAR => '4★',
                self::FIVE_STAR => '5★',
            };
        }
}