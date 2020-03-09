<?php

namespace App\Models;

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
        'email'
    ];

    protected $hidden = [
        'updatedAt',
        'deletedAt'
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'customerId');
    }
}
