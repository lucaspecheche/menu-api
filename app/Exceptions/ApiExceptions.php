<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class ApiExceptions
{
    public const RESOURCE_NOT_FOUND = 'resourceNotFound';

    public static function trans(string $key)
    {
        return trans("exceptions.$key");
    }

    public static function resourceNotFound(): BuildExceptions
    {
        return BuildExceptions::make()
            ->setMessage(self::trans(self::RESOURCE_NOT_FOUND))
            ->setShortMessage(self::RESOURCE_NOT_FOUND)
            ->setStatus(Response::HTTP_NOT_FOUND);
    }
}
