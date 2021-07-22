<?php


namespace App\Http\Controllers;

trait ValidatesPatchRequest
{
    /**
     * @param array<string, string> $rules
     * @return array<string, string>
     */
    protected function prependSometimesToRules(array $rules): array {
        return array_map(
            function (string $rule) {
                if (!str_starts_with($rule, 'sometimes|')) {
                    $rule = 'sometimes|' . $rule;
                }

                return $rule;
            },
            $rules
        );
    }
}
