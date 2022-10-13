<?php

declare(strict_types=1);

namespace App\Models\Traits;

use App\Repository\Filters\FilterInterface;
use Illuminate\Contracts\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeFilter(Builder $query, FilterInterface $filter): Builder
    {
        $filter->apply($query);

        return $query;
    }
}
