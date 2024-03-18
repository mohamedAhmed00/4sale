<?php

namespace App\DataProviders\Classes;

use App\DataProviders\Interfaces\IDataProviderInterface;
use App\Enums\ProviderYEnum;
use App\Filters\ProviderY\BalanceFilter;
use App\Filters\ProviderY\CurrencyFilter;
use App\Filters\ProviderY\StatusFilter;
use Illuminate\Pipeline\Pipeline;
use JsonMachine\Items;

class DataProviderY implements IDataProviderInterface
{
    public function getData($filters)
    {
        $collection = collect();
        if (! request()->has('provider') or request()->get('provider') == 'DataProviderY') {
            $pipeline = resolve(Pipeline::class);
            $users = Items::fromFile(storage_path('app/DataProviderY.json'));
            foreach ($users as $user) {
                $userData = (array) $pipeline->send($user)
                    ->through([
                        BalanceFilter::class,
                        CurrencyFilter::class,
                        StatusFilter::class,
                    ])
                    ->thenReturn();
                if (! empty($userData)) {
                    $userData['status'] = optional(ProviderYEnum::getProviderStatusesByValue())[$user->status];
                    $collection->add($userData);
                }
            }
        }

        return $collection;
    }
}
