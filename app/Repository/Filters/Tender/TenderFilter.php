<?php

declare(strict_types=1);

namespace App\Repository\Filters\Tender;

use App\Repository\Filters\Filter;
use Illuminate\Contracts\Database\Eloquent\Builder;

class TenderFilter extends Filter
{
    public const NAME = 'name';
    public const UPDATE_DATE = 'update_date';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::UPDATE_DATE => [$this, 'updateDate']
        ];
    }

    public function name(Builder $query, string $value)
    {
        $query->where(self::NAME, 'ILIKE', $value);
    }

    public function updateDate(Builder $query, string $value)
    {
        $query->whereRaw('DATE(update_date) = ?', $value);
    }
}
