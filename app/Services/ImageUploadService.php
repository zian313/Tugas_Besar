<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    /**
     * Upload image to storage
     *
     * @param UploadedFile $file
     * @param string $path
     * @return string
     */
    public static function upload(UploadedFile $file, string $path = 'images'): string
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs($path, $filename, 'public');
    }

    /**
     * Delete image from storage
     *
     * @param string|null $path
     * @return bool
     */
    public static function delete(?string $path): bool
    {
        if ($path && Storage::disk('public')->exists($path)) {
            return Storage::disk('public')->delete($path);
        }
        return false;
    }
}
