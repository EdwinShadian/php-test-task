<?php

declare(strict_types=1);

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tender
 *
 * @property int $id
 * @property string $external_code
 * @property string $number
 * @property string|null $status
 * @property string $name
 * @property \Illuminate\Support\Carbon $update_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereExternalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereUpdateDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tender whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tender extends Model
{
    use Filterable;

    public const TABLE = 'tenders';

    public const STATUS_CLOSED = 'Закрыто';
    public const STATUS_CANCELED = 'Отменено';
    public const STATUS_OPENED = 'Открыто';

    public const STATUSES = [
        self::STATUS_OPENED,
        self::STATUS_CLOSED,
        self::STATUS_CANCELED,
    ];

    protected $fillable = [
        'external_code',
        'number',
        'status',
        'name',
        'update_date',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'update_date',
    ];
}
