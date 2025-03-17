<?php

namespace App\Enums\Enums;

enum ReviewStatus: string
{
    case PENDING  = 'pending';
    case APPROVED  = 'approved';
    case REJECTED  = 'rejected';
}
