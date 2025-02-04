<?php

declare(strict_types=1);

namespace App\Enums;

use ArchTech\Enums\InvokableCases;

enum DatabaseDriver: string
{
    use InvokableCases;

    case MariaDB = 'mariadb';
    case MySQL = 'mysql';
    case PostgreSQL = 'pgsql';
    case SQlite = 'sqlite';
}
