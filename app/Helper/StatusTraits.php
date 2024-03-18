<?php

namespace App\Helper;

trait StatusTraits
{
    public static function getProviderStatuses(): array
    {
        return [
            static::authorised->name => static::authorised->value,
            static::decline->name => static::decline->value,
            static::refunded->name => static::refunded->value, ];
    }

    public static function getProviderStatusesByValue(): array
    {
        return [
            static::authorised->value => static::authorised->name,
            static::decline->value => static::decline->name,
            static::refunded->value => static::refunded->name, ];
    }
}
