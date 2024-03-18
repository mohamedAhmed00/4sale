<?php

namespace App\DataProviders\Interfaces;

interface IDataProviderInterface
{
    public function getData($filters);
}
