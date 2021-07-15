<?php

namespace App\Http\Controllers;

use App\Constants\FilesDirectories;
use App\Exceptions\ValidationFailedException;
use App\FileSavers\ProductImageSaver;
use App\Models\Album;
use App\Services\ValidationService;
use Illuminate\Http\Request;

class AlbumController extends BaseController
{
    private static array $albumValidationRules = [
        'title' => 'required|string|max:256',
        'description' => 'sometimes|string',
        'product_id' => 'required|numeric|exists:products,id'
    ];

    private static array $uploadValidationRules = [
        'images_files' => 'required',
        'images_files.*' => 'image|mimes:png,jpg,gif'
    ];

    /**
     * @throws ValidationFailedException
     */
    public function create(Request $request)
    {
        $values = $request->only(['title', 'description', 'product_id']);

        $validated = ValidationService::getValidatedOrThrow(
            $values,
            self::$albumValidationRules
        );

        return Album::create($validated);
    }

    /**
     * @throws ValidationFailedException
     */
    public function uploadImages(Album $album, Request $request)
    {
        $values = $request->only('images_files');

        $validated = ValidationService::getValidatedOrThrow(
            $values,
            self::$uploadValidationRules
        );

        $uploadedFiles = $validated['images_files'];

        foreach ($uploadedFiles as $file) {
            $path = $file->store(FilesDirectories::PRODUCTS_IMAGES);
            //...
        }
    }
}
