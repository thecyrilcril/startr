<?php

declare(strict_types=1);

namespace App\Traits;

use App\Enums\DatabaseDriver;
use Closure;
use Illuminate\Database\Schema\Blueprint;

trait BlueprintMacros
{
    public function registerBlueprintMacros(): void
    {
        Blueprint::macro('whenSQlite', fn(Closure $callback) => (DatabaseDriver::SQlite->value === config('database.default')) ? $callback($this) : null);

        Blueprint::macro('whenMySQL', fn(Closure $callback) => (DatabaseDriver::MySQL->value === config('database.default')) ? $callback($this) : null);
    }
}
