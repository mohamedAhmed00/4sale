<?php

namespace App\Filters\ProviderX;

use Closure;

class CurrencyFilter
{
    public function handle($user, Closure $next)
    {
        if (! empty($user) and request()->has('currency')) {
            if (strtolower($user->Currency) != strtolower(request()->get('currency'))) {
                $user = null;
            }
        }

        return $next($user);
    }
}
