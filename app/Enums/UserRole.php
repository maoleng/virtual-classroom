<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{

    const ADMIN = 0;
    const STUDENT = 1;
    const TEACHER = 2;
}
