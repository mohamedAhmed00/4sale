<?php

namespace App\Filters\ProviderY;

use Closure;

class CurrencyFilter
{
    public function handle($user, Closure $next)
    {
        if (! empty($user) and request()->has('currency')) {
            if (strtolower($user->currency) != strtolower(request()->get('currency'))) {
                $user = null;
            }
        }

        return $next($user);
    }
}
