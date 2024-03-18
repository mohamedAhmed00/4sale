<?php

namespace App\Factories\Interfaces;

interface IDataProviderFactoryInterface
{
    public function getProvider(?string $type = null);
}
