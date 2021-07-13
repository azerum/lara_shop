<?php


namespace App\Services;

use App\Exceptions\ValidationFailedException;
use Illuminate\Support\Facades\Validator;

class ValidationService
{
    /**
     * @param string[] $rules
     * @throws ValidationFailedException
     */
    public function getValidatedOrThrow(array $values, array $rules): array {
        $validator = Validator::make($values, $rules);

        if ($validator->fails()) {
            throw new ValidationFailedException($validator->errors()->toArray());
        }

        return $validator->validated();
    }
}
