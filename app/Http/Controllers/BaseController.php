<?php


namespace App\Http\Controllers;


class BaseController extends Controller
{
    /**
     * @param array<string, string> $rules
     * @return array<string, string>
     */
    protected function addSometimesToRules(array $rules): array {
        return array_map(
            function(string $rule) {
                if (!str_starts_with($rule, 'sometimes|')) {
                    $rule = 'sometimes|' . $rule;
                }

                return $rule;
            },
            $rules
        );
    }
}
