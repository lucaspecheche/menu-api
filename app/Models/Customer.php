<?php

namespace App\Models;

use App\Exceptions\CustomerExceptions;

class Customer extends BaseModel
{
    protected $fillable = [
        'firstName',
        'lastName',
        'email'
    ];

    protected $hidden = [
        'updatedAt',
        'deletedAt'
    ];

    public static function findOrFail($id): Customer
    {
        $customer = self::find($id);

        if($customer === null) {
            throw CustomerExceptions::notFound();
        }

        return $customer;
    }
}
