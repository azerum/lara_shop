<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use ReflectionClass;

abstract class FactoryWithRandomConstantGeneration extends Factory
{
    /**
     * Выбирает из модели случайную константу, название которой
     * начинается с $prefix
     */
    protected function randomModelConstantWithPrefix(string $prefix)
    {
        $constants = $this->getModelConstantsWithPrefix($prefix);
        return $this->faker->randomElement($constants);
    }

    private function getModelConstantsWithPrefix(string $prefix): array
    {
        /** @noinspection PhpUnhandledExceptionInspection*/
        //В этой строке может возникнуть ReflectionException, если
        //класс с названием, указанным в $this->model не существует.
        //Но если модель фабрики не существует, то ошибка возникнет раньше,
        //чем код дойтет до этого метода. Так что ReflectionException
        //не должно возникать здесь никогда
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
