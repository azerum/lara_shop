<?php

namespace App\Http\Controllers;

use App\Constants\StorageDirectories;
use App\Models\Album;
use App\Models\Image;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AlbumController extends Controller
{
    public function getAll()
    {
        return Album::all()->load('images')->toArray();
    }

    /**
     * @throws ValidationException
     */
    public function create(Request $request)
    {
        $rules = [
            'title' => 'required|string|max:256',
            'description' => 'nullable|string',
            'product_id' => 'required|numeric|exists:products,id'
        ];

        /**
         * Метод validate() определен во встроенном в Laravel trait'е
         * ValidatesRequest.
         * Этот trait используется в классе @see \App\Http\Controllers\Controller,
         * от которого по умолчанию наследуют все контроллеры.
         * validate() возвращает отвалидированные данные или выбрасывает
         * ValidationException, если данные не прошли проверку.
         * Мы обрабатываем ValidationException в @see \App\Exceptions\Handler
         */

        $validated = $this->validate($request, $rules);
        return Album::create($validated);
    }

    /**
     * @throws ValidationException
     */
    public function uploadImages(Album $album, Request $request)
    {
        $rules = [
            'images' => 'required',
            'images.*' => 'image|mimes:png,jpg,gif'
        ];

        $validated = $this->validate($request, $rules);

        /**
         * @var UploadedFile[] $uploadedFiles
         */
        $uploadedFiles = $validated['images'];

        foreach ($uploadedFiles as $file) {
            $fileModel =
                FileService::save($file, StorageDirectories::PRODUCTS_IMAGES);

            $image = new Image();
            $image->file_id = $fileModel->id;
            $image->album()->associate($album);

            $image->save();
        }

        $album->load('images');
        return $album;
    }
}
