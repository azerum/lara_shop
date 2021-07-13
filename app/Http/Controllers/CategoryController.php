<?php

namespace App\Http\Controllers;

use App\Exceptions\ValidationFailedException;
use App\Services\ValidationService;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function getAll()
    {
        return Category::all()->toArray();
    }

    /**
     * @throws ValidationFailedException
     */
    public function create(Request $request, ValidationService $validationService)
    {
        $values = $request->all(['title']);

        $rules = [
            'title' => 'required|string|max:64'
        ];

        $validated = $validationService->getValidatedOrThrow($values, $rules);

        return Category::create($validated);
    }

    public function patch(Category $category, ValidationService $validationService)
    {
        $values = $category->getAttributes();

        $rules = [
            'title' => 'sometimes|required|string|max:64'
        ];

        $validated = $validationService->getValidatedOrThrow($values, $rules);
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
