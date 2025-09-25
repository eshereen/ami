<?php

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Interfaces\ImageInterface;

class ImageService
{
    protected ImageManager $manager;

    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }
    /**
     * Convert uploaded image to WebP format with high quality compression
     *
     * @param UploadedFile $file
     * @param string $directory
     * @param int $quality
     * @return string The path to the converted WebP image
     */
    public function convertToWebP(UploadedFile $file, string $directory = 'products', int $quality = 90): string
    {
        // Generate unique filename with webp extension
        $filename = uniqid() . '_' . time() . '.webp';
        $path = $directory . '/' . $filename;

        // Create image instance from uploaded file
        $image = $this->manager->read($file->getPathname());

        // Optimize image dimensions for web (max 1200px width while maintaining aspect ratio)
        $image = $this->optimizeDimensions($image);

        // Convert to WebP with high quality
        $webpData = $image->toWebp($quality);

        // Store the WebP image
        Storage::disk('public')->put($path, $webpData);

        return $path;
    }

    /**
     * Optimize image dimensions for web performance
     *
     * @param ImageInterface $image
     * @param int $maxWidth
     * @return ImageInterface
     */
    private function optimizeDimensions(ImageInterface $image, int $maxWidth = 1200): ImageInterface
    {
        $width = $image->width();
        $height = $image->height();

        // Only resize if image is larger than max width
        if ($width > $maxWidth) {
            $newHeight = (int) ($height * ($maxWidth / $width));
            $image = $image->resize($maxWidth, $newHeight);
        }

        return $image;
    }

    /**
     * Create thumbnail version of the image
     *
     * @param string $imagePath
     * @param int $width
     * @param int $height
     * @param int $quality
     * @return string
     */
    public function createThumbnail(string $imagePath, int $width = 300, int $height = 300, int $quality = 85): string
    {
        $fullPath = Storage::disk('public')->path($imagePath);

        if (!file_exists($fullPath)) {
            throw new \Exception("Image file not found: {$imagePath}");
        }

        $image = $this->manager->read($fullPath);

        // Create thumbnail with crop to maintain aspect ratio
        $thumbnail = $image->cover($width, $height);

        // Generate thumbnail filename
        $pathInfo = pathinfo($imagePath);
        $thumbnailPath = $pathInfo['dirname'] . '/thumb_' . $pathInfo['filename'] . '.webp';

        // Convert thumbnail to WebP
        $webpData = $thumbnail->toWebp($quality);

        // Store the thumbnail
        Storage::disk('public')->put($thumbnailPath, $webpData);

        return $thumbnailPath;
    }

    /**
     * Delete old image file if it exists
     *
     * @param string|null $oldImagePath
     * @return void
     */
    public function deleteOldImage(?string $oldImagePath): void
    {
        if ($oldImagePath && Storage::disk('public')->exists($oldImagePath)) {
            Storage::disk('public')->delete($oldImagePath);

            // Also delete thumbnail if exists
            $pathInfo = pathinfo($oldImagePath);
            $thumbnailPath = $pathInfo['dirname'] . '/thumb_' . $pathInfo['filename'] . '.webp';

            if (Storage::disk('public')->exists($thumbnailPath)) {
                Storage::disk('public')->delete($thumbnailPath);
            }
        }
    }

    /**
     * Get optimized image sizes for responsive images
     *
     * @param string $imagePath
     * @return array
     */
    public function getResponsiveImageSizes(string $imagePath): array
    {
        $fullPath = Storage::disk('public')->path($imagePath);

        if (!file_exists($fullPath)) {
            return [];
        }

        $image = $this->manager->read($fullPath);
        $originalWidth = $image->width();
        $originalHeight = $image->height();

        $sizes = [];
        $breakpoints = [320, 480, 768, 1024, 1200];

        foreach ($breakpoints as $width) {
            if ($width < $originalWidth) {
                $height = (int) ($originalHeight * ($width / $originalWidth));
                $sizes[] = [
                    'width' => $width,
                    'height' => $height,
                    'url' => $this->createResponsiveImage($imagePath, $width, $height)
                ];
            }
        }

        return $sizes;
    }

    /**
     * Create responsive image variant
     *
     * @param string $imagePath
     * @param int $width
     * @param int $height
     * @return string
     */
    private function createResponsiveImage(string $imagePath, int $width, int $height): string
    {
        $fullPath = Storage::disk('public')->path($imagePath);
        $image = $this->manager->read($fullPath);

        $resized = $image->resize($width, $height);

        $pathInfo = pathinfo($imagePath);
        $responsivePath = $pathInfo['dirname'] . '/' . $pathInfo['filename'] . "_{$width}x{$height}.webp";

        $webpData = $resized->toWebp(85);
        Storage::disk('public')->put($responsivePath, $webpData);

            return $responsivePath;
    }
}
