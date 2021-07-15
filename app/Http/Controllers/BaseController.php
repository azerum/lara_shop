<?php


namespace App\Http\Controllers;


class BaseController extends Controller
{
    /**
     * @param array<string, string> $rules
     * @return array<string, string>
     */
    protected function addSometimesToRules(array $rules): array {
        $rulesWithoutSometimes = array_filter(
            $rules,
            fn($rule) => !str_starts_with($rule, 'sometimes|')
        );

        return array_map(
            fn($rule) => 'sometimes|' . $rule,
            $rulesWithoutSometimes
        );
    }
}
