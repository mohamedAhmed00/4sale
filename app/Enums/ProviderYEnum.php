<?php

namespace App\Enums;

use App\Helper\StatusTraits;

enum ProviderYEnum: string
{
    use StatusTraits;
    case authorised = '100';
    case decline = '200';
    case refunded = '300';
}
