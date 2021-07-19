<?php

namespace App\Http\Controllers;

use App\Constants\FilesDirectories;
use App\Exceptions\ValidationFailedException;
use App\Models\Album;
use App\Models\Image;
use App\Services\FileService;
use App\Services\ValidationService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class AlbumController extends BaseController
{
    private static array $albumValidationRules = [
        'title' => 'required|string|max:256',
        'description' => 'sometimes|string',
        'product_id' => 'required|numeric|exists:products,id'
    ];

    private static array $uploadValidationRules = [
        'images' => 'required',
        'images.*' => 'image|mimes:png,jpg,gif'
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
        $values = $request->only('images');

        $validated = ValidationService::getValidatedOrThrow(
            $values,
            self::$uploadValidationRules
        );

        /**
         * @var UploadedFile[] $uploadedFiles
         */
        $uploadedFiles = $validated['images'];

        foreach ($uploadedFiles as $file) {
            $fileModel = FileService::save($file, FilesDirectories::PRODUCTS_IMAGES);

            $image = new Image();
            $image->file_id = $fileModel->id;
            $image->album()->associate($album);

            $image->save();
        }

        $album->load('images');
        return $album;
    }
}
