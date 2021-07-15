<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationFailedException;
use App\Services\ValidationService;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends BaseController
{
    private static array $validationRules = [
        'title' => 'required|string|max:64'
    ];

    public function getAll()
    {
        return Category::all()->toArray();
    }

    /**
     * @throws ValidationFailedException
     */
    public function create(Request $request)
    {
        $values = $request->all(['title']);

        $validated = ValidationService::getValidatedOrThrow(
            $values,
            self::$validationRules
        );

        return Category::create($validated);
    }

    /**
     * @throws ValidationFailedException
     */
    public function patch(Category $category, Request $request)
    {
        $values = $request->only('title');
        $rules = self::addSometimesToRules(self::$validationRules);

        $validated = ValidationService::getValidatedOrThrow(
            $values,
            $rules
        );

        $category->update($validated);

        return response()->noContent();
    }

    public function delete(Category $category) {
        if ($category->subcategories()->exists()) {
            return response(status: Response::HTTP_CONFLICT);
        }

        $category->delete();
        return response()->noContent();
    }
}
