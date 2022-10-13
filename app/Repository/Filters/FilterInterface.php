<?php

declare(strict_types=1);

namespace App\Repository\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface FilterInterface
{
    public function apply(Builder $query);
}
