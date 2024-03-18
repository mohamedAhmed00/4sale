<?php

namespace App\Filters\ProviderY;

use Closure;

class BalanceFilter
{
    public function handle($user, Closure $next)
    {
        if (! empty($user) and request()->has('balanceMin')) {
            if ($user->balance < request()->get('balanceMin')) {
                $user = null;
            }
        }

        if (! empty($user) and request()->has('balanceMax')) {
            if ($user->balance > request()->get('balanceMax')) {
                $user = null;
            }
        }

        return $next($user);
    }
}
