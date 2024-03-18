<?php

namespace App\Enums;

use App\Helper\StatusTraits;

enum ProviderXEnum: string
{
    use StatusTraits;
    case authorised = '1';
    case decline = '2';
    case refunded = '3';
}
