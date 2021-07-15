<?php


namespace App\Services;

use App\Exceptions\InvalidModelAttributesException;
use Illuminate\Support\Facades\Validator;

class ValidationService
{
    /**
     * @param string[] $rules
     * @throws InvalidModelAttributesException
     */
    public function getValidatedOrThrow(array $values, array $rules): array {
        $validator = Validator::make($values, $rules);

        if ($validator->fails()) {
            throw new InvalidModelAttributesException($validator->errors()->toArray());
        }

        return $validator->validated();
    }

    /**
     * @throws InvalidModelAttributesException
     */
    public static function throwIfInvalid(array $values, array $rules) {
        $validator = Validator::make($values, $rules);

        if ($validator->fails()) {
            throw new InvalidModelAttributesException($validator->errors()->toArray());
        }
    }
}
