<?php

namespace App\Filters\ProviderY;

use App\Enums\ProviderYEnum;
use Closure;

class StatusFilter
{
    public function handle($user, Closure $next)
    {
        if (! empty($user) and request()->has('status') and array_key_exists(request()->get('status'), ProviderYEnum::getProviderStatuses())) {
            if ($user->status != ProviderYEnum::getProviderStatuses()[request()->get('status')]) {
                $user = null;
            }
        }

        return $next($user);
    }
}
