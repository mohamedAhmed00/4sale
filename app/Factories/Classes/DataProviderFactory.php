<?php

namespace App\Factories\Classes;

use App\DataProviders\Classes\DataProviderX;
use App\DataProviders\Classes\DataProviderY;
use App\Factories\Interfaces\IDataProviderFactoryInterface;

class DataProviderFactory implements IDataProviderFactoryInterface
{
    public function getProvider(?string $type = null)
    {
        return match ($type) {
            'DataProviderX' => new DataProviderX(),
            'DataProviderY' => new DataProviderY(),
            default => [new DataProviderX(), new DataProviderY()]
        };
    }
}
