<?php

namespace App\Filters\ProviderX;

use App\Enums\ProviderXEnum;
use Closure;

class StatusFilter
{
    public function handle($user, Closure $next)
    {
        if (! empty($user) and request()->has('status') and array_key_exists(request()->get('status'), ProviderXEnum::getProviderStatuses())) {
            if ($user->statusCode != ProviderXEnum::getProviderStatuses()[request()->get('status')]) {
                $user = null;
            }
        }

        return $next($user);
    }
}
