<?php

namespace App\Helpers;

use InvalidArgumentException;
use ReflectionClass;
use ReflectionException;

class FactoriesHelpers
{
    /**
     * @param string $className
     * @param string $prefix
     * @return array
     * @throws InvalidArgumentException if class with name $className does not exist
     */
    public static function getClassConstantsByPrefix(string $className, string $prefix): array
    {
        $constants = null;

        try {
            $reflection = new ReflectionClass($className);
            $constants = $reflection->getConstants();
        }
        catch (ReflectionException) {
            throw new InvalidArgumentException("Class with name '$className' does not exists.");
        }

        $filteredByPrefix = array_filter(
            $constants,
            fn($constantName) => str_starts_with($constantName, $prefix),
            ARRAY_FILTER_USE_KEY
        );

        return $filteredByPrefix;
    }
}
