<?php

namespace App\Services\Classes;

use App\Factories\Interfaces\IDataProviderFactoryInterface;
use App\Services\Interfaces\IUserServiceInterface;
use Illuminate\Support\Collection;

class UserService implements IUserServiceInterface
{
    public function __construct(readonly private IDataProviderFactoryInterface $dataProviderFactory)
    {
    }

    public function getUsers(array $data)
    {
        $results = new Collection();
        $providers = $this->dataProviderFactory->getProvider();
        foreach ($providers as $provider) {
            if ($users = $provider->getData($data)) {
                $results = $results->merge($users);
            }
        }

        return $results;
    }
}
