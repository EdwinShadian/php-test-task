<?php

declare(strict_types=1);

namespace App\Repository\Tender;

use App\Models\Tender;
use App\Repository\Filters\Tender\TenderFilter;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TenderRepository
{
    public function findMany(array $params): Collection|array
    {
        if ([] !== $params) {
            $filter = app()->make(TenderFilter::class, ['filters' => array_filter($params)]);

            return Tender::filter($filter)->get()->all();
        }

        return Tender::all();
    }

    public function findById(int $id): Model|Collection|array|Builder|Tender|null
    {
        return Tender::query()->findOrFail($id);
    }

    public function create(array $params): Tender
    {
        $params['update_date'] = DateTime::createFromFormat('Y-m-d H:i:s', $params['update_date']);

        return Tender::create($params);
    }

    public function update(Tender $tender, array $params): Tender
    {
        $tender->update($params);

        return $tender;
    }
}
