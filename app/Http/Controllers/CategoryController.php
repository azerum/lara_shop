<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidModelAttributesException;
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
     * @throws InvalidModelAttributesException
     */
    public function create(Request $request)
    {
        $attributes = $request->all(['title']);
        return Category::create($attributes);
    }

    /**
     * @throws InvalidModelAttributesException
     */
    public function patch(Category $category, Request $request)
    {
        $attributes = $request->only('title');
        $category->update($attributes);

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
