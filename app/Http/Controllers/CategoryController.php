<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    use ValidatesPatchRequest;

    private static array $categoryRules = [
        'title' => 'required|string|max:64'
    ];

    public function getAll()
    {
        return Category::all()->toArray();
    }

    /**
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $validated = $this->validate($request, self::$categoryRules);
        return Category::create($validated);
    }

    /**
     * @throws ValidationException
     */
    public function patch(Category $category, Request $request)
    {
        //При редактировании модели нет обязательных полей,
        //так что добавляем в начало всех правил валидации 'sometimes'
        $rules = $this->prependSometimesToRules(self::$categoryRules);

        $validated = $this->validate($request, $rules);
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
