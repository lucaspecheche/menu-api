<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        return self::query()->with('customer')->paginate(10);
    }
}
