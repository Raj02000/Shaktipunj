<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class ImageUploader
{
    public static function upload($file, $folder = 'images')
    {
        $validatedData = self::validateImage($file);

        if (! $validatedData['valid']) {
            throw new \Exception($validatedData['message']);
        }

        // $fileName = self::generateFileName($file);
        $fileName = $file->getClientOriginalName();
        $path = $file->storeAs($folder, $fileName, 'public');

        return 'storage/'.$path;
    }

    private static function generateFileName($file)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::random(20).'.'.$extension;

        return $fileName;
    }

    private static function validateImage($file)
    {

        $rules = ['image', 'mimes:jpeg,png,jpg,gif,webp'];

        $validator = validator()->make(['image' => $file], ['image' => $rules]);

        if ($validator->fails()) {
            return ['valid' => false, 'message' => $validator->errors()->first()];
        }

        return ['valid' => true, 'message' => 'Image validation passed'];
    }
}
