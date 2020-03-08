<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
        'status'
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customerId', 'id')->withTrashed();
    }

    public static function withCustomer()
    {
        return self::query()->with('customer')->paginate(10);
    }
}
