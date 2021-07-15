<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class InvalidModelAttributesException extends Exception
{
    private array $errors;

    /**
     * @param string[] $errors
     */
    public function __construct(array $errors, Throwable $previous = null)
    {
        parent::__construct(
            'Validation failed, see getErrors() method of this exception',
            previous: $previous
        );

        $this->errors = $errors;
    }

    /**
     * @return string[]
     */
    public function getErrors(): array {
        return $this->errors;
    }
}
