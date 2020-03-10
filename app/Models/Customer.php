<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property Collection orders
 *
 */
class Customer extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'createdAt'
    ];

    protected $hidden = [
        'updatedAt',
        'deletedAt'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customerId');
    }

    public static function filter(array $filters): Builder
    {
        $query = self::query();

        foreach ($filters as $key => $value) {
            switch ($key) {
                case 'startDate':
                    $query->whereDate('createdAt', '>=', Carbon::parse($value)->startOfDay());
                    break;
                case 'endDate':
                    $query->whereDate('createdAt', '<=', Carbon::parse($value)->endOfDay());
                    break;
            }
        }

        return $query;
    }
}
