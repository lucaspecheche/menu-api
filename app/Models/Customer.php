<?php

namespace App\Models;

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
}
