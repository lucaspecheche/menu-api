<?php

namespace App\Models;

use App\Exceptions\ApiExceptions;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class BaseModel extends Model
{
    public const CREATED_AT  = 'createdAt';
    public const UPDATED_AT  = 'updatedAt';
    public const DELETED_AT  = 'deletedAt';

    protected $dates = [
        self::CREATED_AT,
        self::UPDATED_AT,
        self::DELETED_AT
    ];

    protected function serializeDateApi(DateTimeInterface $date): string
    {
        return Carbon::instance($date)->format('Y-m-d H:i');
    }

    public static function findOrFail($id): Model
    {
        $model = self::find($id);

        throw_unless($model, ApiExceptions::modelNotFound());

        return $model;
    }
}
