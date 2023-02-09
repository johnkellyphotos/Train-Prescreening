<?php

namespace definition;

enum TrainCarEmptyWeight: int
{
    case CABOOSE = 35000;
    case CARGO = 60000;
    case ENGINE = 480000;
    case PASSENGER = 50000;

    public static function fromName(string $name): ?TrainCarEmptyWeight
    {
        foreach (self::cases() as $enums) {
            if ($name === $enums->name) {
                return $enums;
            }
        }
        return null;
    }
}