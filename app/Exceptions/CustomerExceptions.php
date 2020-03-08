<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class CustomerExceptions
{
    public const NOT_FOUND = 'customerNotFound';

    public static function trans(string $key)
    {
        return trans("exceptions.customer.$key");
    }

    public static function notFound(): BuildExceptions
    {
        return BuildExceptions::make()
            ->setMessage(self::trans(self::NOT_FOUND))
            ->setShortMessage(self::NOT_FOUND)
            ->setStatus(Response::HTTP_NOT_FOUND);
    }
}
