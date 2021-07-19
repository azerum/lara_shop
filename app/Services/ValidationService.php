<?php

namespace App\Services;

use App\Exceptions\ValidationFailedException;
use Illuminate\Support\Facades\Validator;

class ValidationService
{
    /** @noinspection PhpDocMissingThrowsInspection  */

    /**
     * @param string[] $rules
     * @throws ValidationFailedException
     */
    public static function getValidatedOrThrow(array $values, array $rules): array {
        $validator = Validator::make($values, $rules);

        if ($validator->fails()) {
            throw new ValidationFailedException($validator->errors()->toArray());
        }

        /** @noinspection PhpUnhandledExceptionInspection*/
        //$validator->validated() throws only if $validator->fails() is true,
        //but if it's true previous if block throws exception
        //and returns from method

        return $validator->validated();
    }
}
