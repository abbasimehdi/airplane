<?php

namespace App\Exceptions;

use App\Http\Resources\BaseListCollection;
use App\Http\Resources\PassportCollection;
use Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PassportIdException extends Exception
{
    //
    public function message()
    {
        return (new PassportCollection(collect()))
            ->response()
            ->setStatusCode(ResponseAlias::HTTP_NOT_FOUND);
    }
}
