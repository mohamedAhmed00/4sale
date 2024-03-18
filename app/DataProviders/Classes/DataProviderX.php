<?php

namespace App\DataProviders\Classes;

use App\DataProviders\Interfaces\IDataProviderInterface;
use App\Enums\ProviderXEnum;
use App\Filters\ProviderX\BalanceFilter;
use App\Filters\ProviderX\CurrencyFilter;
use App\Filters\ProviderX\StatusFilter;
use Illuminate\Pipeline\Pipeline;
use JsonMachine\Items;

class DataProviderX implements IDataProviderInterface
{
    public function getData($filters)
    {
        $collection = collect();
        if (! request()->has('provider') or request()->get('provider') == 'DataProviderX') {
            $pipeline = resolve(Pipeline::class);
            $users = Items::fromFile(storage_path('app/DataProviderX.json'));
            foreach ($users as $user) {
                $userData = $pipeline->send($user)
                    ->through([
                        BalanceFilter::class,
                        CurrencyFilter::class,
                        StatusFilter::class,
                    ])
                    ->thenReturn();
                if (! empty($userData)) {
                    $collection->add([
                        'id' => $user->parentIdentification,
                        'balance' => $user->parentAmount,
                        'email' => $user->parentEmail,
                        'currency' => $user->Currency,
                        'status' => ProviderXEnum::getProviderStatusesByValue()[$user->statusCode],
                        'created_at' => $user->registerationDate,
                    ]);
                }
            }
        }

        return $collection;
    }
}
