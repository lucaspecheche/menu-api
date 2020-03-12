<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;

/**
 * @property Carbon createdAt
 */
class Order extends BaseModel
{
    use SoftDeletes;

    public const PENDING  = 'PENDING';
    public const APPROVED = 'APPROVED';
    public const CANCELLED = 'CANCELLED';

    public const STATUS_AVAILABLE = [
        self::PENDING,
        self::APPROVED,
        self::CANCELLED
    ];

    protected $fillable = [
        'value',
        'customerId',
        'status',
        'createdAt'
    ];

    protected $hidden = [
        'deletedAt',
        'updatedAt'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customerId', 'id')->withTrashed();
    }

    public static function withCustomer(): LengthAwarePaginator
    {
        return self::query()
            ->with('customer')
            ->orderByDesc('createdAt')
            ->paginate(10);
    }

    public static function filter(array $filters): Builder
    {
        $query = self::query();

        foreach ($filters as $key => $value) {
            switch ($key) {
                case 'startDate':
                    $query->whereDate('createdAt', '>=',  Carbon::parse($value)->startOfDay());
                    break;
                case 'endDate':
                    $query->whereDate('createdAt', '<=',  Carbon::parse($value)->endOfDay());
                    break;
                case 'status':
                    $query->whereIn($key, Arr::wrap($value));
            }
        }

        return $query;
    }
}
