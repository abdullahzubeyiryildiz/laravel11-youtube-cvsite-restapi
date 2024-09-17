<?php

namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadImageService
{
    private const ALLOWED_EXTENSIONS = ['jpg', 'JPEG', 'png', 'pdf', 'svg', 'webp', 'jiff'];

    public function uploadMultipleImages(array $images,$folder=null)
    {
        $uploadedImages = [];
        foreach ($images as $image) {
            $uploadedImages[] = $this->uploadImage($image,$folder);
        }

        return $uploadedImages;
    }

    private function uploadImage(object $image,$folder=null)
    {

        $validationErrors = $this->validateExtension($image);
        if (!empty($validationErrors)) {
            return ['errors' => $validationErrors];
        }

        $fileName = $this->generateFileName($image);
        $extension = $image->getClientOriginalExtension();
        $subfolder = !empty($folder) ? $folder.'/' : '';
        $path = 'uploads/'.$subfolder;
        $uploadPath = $path . $fileName;

        $this->createFolder($path);

        if (in_array($extension, ['pdf', 'svg'])) {
            $this->saveOriginalImage($image, $uploadPath);
            $newFilename = $fileName.'.'.$extension;
        } else {
            $this->resizeAndSaveWebp($image, $uploadPath);
            $newFilename = $fileName.'.webp';
        }

        return [
            'name' => $newFilename,
            'path'=> $path.$newFilename,
            'url' => asset($newFilename),
        ];
    }

    private function validateExtension(object $image): array
    {
        $extension = $image->getClientOriginalExtension();
        if (!in_array($extension, self::ALLOWED_EXTENSIONS)) {
            throw new \Exception('Invalid file extension: ' . $extension);
        }

        return [];
    }

    private function generateFileName(object $image): string
    {
        return time() . '-' . Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
    }

    private function saveOriginalImage(object $image, string $path): void
    {
        Storage::put($path, file_get_contents($image));
    }

    private function resizeAndSaveWebp(object $image, string $path): void
    {
        try {
            $resizedImage = Image::make($image);
            $resizedImage->encode('webp', 75)->save($path.'.webp');
        } catch (\Exception $e) {
            throw new \Exception('Error resizing image: ' . $e->getMessage());
        }
    }

    public function deleteFile($filePath)
    {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public function createFolder(string $directoryPath, int $permissions = 0777): void
    {
        if (!file_exists($directoryPath)) {
            mkdir($directoryPath, $permissions, true);
        }
    }
}
