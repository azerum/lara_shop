<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Services\ValidationService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AlbumController extends Controller
{
    /**
     * @throws \App\Exceptions\ValidationFailedException
     */
    public function create(Request $request, ValidationService $validationService)
    {
        $values = $request->only(['title', 'description', 'product_id']);
        $rules = Album::$rules;

        $validated = $validationService->getValidatedOrThrow($values, $rules);
        return Album::create($validated);
    }

    /**
     * @throws \App\Exceptions\ValidationFailedException
     */
    public function uploadImages(
        Album $album,
        Request $request,
        ValidationService $validationService
    )
    {
        $values = $request->only('images');

        $rules = [
            'images' => 'required',
            'images.*' => 'image|mimes:jpg,png,gif'
        ];

        $validated = $validationService->getValidatedOrThrow($values, $rules);
        $uploadedFiles = $validated['images'];
    }
}
