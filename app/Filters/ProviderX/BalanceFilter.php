<?php

namespace App\Filters\ProviderX;

use Closure;

class BalanceFilter
{
    public function handle($user, Closure $next)
    {
        if (! empty($user) and request()->has('balanceMin')) {
            if ($user->parentAmount < request()->get('balanceMin')) {
                $user = null;
            }
        }

        if (! empty($user) and request()->has('balanceMax')) {
            if ($user->parentAmount > request()->get('balanceMax')) {
                $user = null;
            }
        }

        return $next($user);
    }
}
