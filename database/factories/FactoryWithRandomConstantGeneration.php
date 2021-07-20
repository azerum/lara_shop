<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReflectionClass;

abstract class FactoryWithRandomConstantGeneration extends Factory
{
    protected function randomModelConstantWithPrefix(string $prefix)
    {
        $constants = $this->getModelConstantsWithPrefix($prefix);
        return $this->faker->randomElement($constants);
    }

    private function getModelConstantsWithPrefix(string $prefix): array
    {
        /** @noinspection PhpUnhandledExceptionInspection*/
        //ReflectionException can be thrown here only if class with
        //name $this->model doesn't exist. This should never happen,
        //as factory won't work at all if model is invalid

        $reflection = new ReflectionClass($this->model);

        $constants = $reflection->getConstants();

        $withPrefix = array_filter(
            $constants,
            fn($constantName) => str_starts_with($constantName, $prefix),
            ARRAY_FILTER_USE_KEY
        );

        return $withPrefix;
    }
}
