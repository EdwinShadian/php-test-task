<?php

declare(strict_types=1);

namespace App\Repository\Filters;

use Illuminate\Contracts\Database\Eloquent\Builder;

abstract class Filter implements FilterInterface
{
    public function __construct(
        private array $filters
    ) {
    }

    abstract protected function getCallbacks(): array;

    public function apply(Builder $query)
    {
        foreach ($this->getCallbacks() as $name => $callback) {
            if (isset($this->filters[$name])) {
                call_user_func($callback, $query, $this->filters[$name]);
            }
        }
    }
}
