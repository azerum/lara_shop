<?php


namespace App\Services;

use App\Models\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileService
{
    public static function save(
        UploadedFile $uploadedFile,
        string $directoryPath
    ): File
    {
        $filePath = $uploadedFile->store($directoryPath);

        $file = new File();
        $file->original_name = $uploadedFile->getClientOriginalName();
        $file->path = $filePath;

        $file->save();
        return $file;
    }
}
