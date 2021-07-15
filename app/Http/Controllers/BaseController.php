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
            fn($rule) => 'sometimes|' . $rule,
            $rules
        );
    }
}
