<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\FileUpload;
use App\Services\ImageService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class WebPFileUpload extends FileUpload
{
    protected ImageService $imageService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->imageService = app(ImageService::class);

        // Set image-specific configurations
        $this->image()
            ->imageEditor()
            ->imageEditorAspectRatios([
                '16:9',
                '4:3',
                '1:1',
            ])
            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/svg+xml', 'image/webp'])
            ->maxSize(10240) // 10MB max
            ->disk('public')
            ->directory('products')
            ->visibility('public')
            ->preserveFilenames(false)
            ->reorderable()
            ->openable()
            ->downloadable()
            ->previewable(true)
            ->imagePreviewHeight('250')
            ->loadingIndicatorPosition('left')
            ->panelAspectRatio('2:1')
            ->panelLayout('integrated')
            ->removeUploadedFileButtonPosition('right')
            ->uploadButtonPosition('left')
            ->uploadProgressIndicatorPosition('left');

        // Custom save process to convert to WebP
        $this->saveUploadedFileUsing(function (TemporaryUploadedFile $file, $component) {
            return $this->convertAndSaveAsWebP($file);
        });

        // Custom delete process to clean up WebP files
        $this->deleteUploadedFileUsing(function ($file) {
            $this->imageService->deleteOldImage($file);
        });
    }

    /**
     * Convert uploaded file to WebP and save
     *
     * @param TemporaryUploadedFile $file
     * @return string
     */
    protected function convertAndSaveAsWebP(TemporaryUploadedFile $file): string
    {
        // Create a proper UploadedFile instance from the temporary file
        $uploadedFile = new UploadedFile(
            $file->getPathname(),
            $file->getClientOriginalName(),
            $file->getMimeType(),
            null,
            true
        );

        try {
            // Convert to WebP with high quality (90%)
            $webpPath = $this->imageService->convertToWebP($uploadedFile, 'products', 90);

            // Create thumbnail for admin interface
            $this->imageService->createThumbnail($webpPath, 300, 300, 85);

            return $webpPath;

        } catch (\Exception $e) {
            // If WebP conversion fails, fallback to original file storage
            Log::warning('WebP conversion failed: ' . $e->getMessage());

            // Store original file as fallback
            return $file->store('products', 'public');
        }
    }

    /**
     * Create WebP file upload with default configurations
     *
     * @param string|null $name
     * @return static
     */
    public static function make(string $name = null): static
    {
        $static = parent::make($name);

        $static->label('Product Image')
            ->helperText('Upload high-quality images. They will be automatically converted to WebP format for optimal web performance.')
            ->hint('Recommended: 1200x800px or larger for best quality')
            ->hintIcon('heroicon-m-information-circle')
            ->columnSpanFull();

        return $static;
    }

    /**
     * Configure for product gallery (multiple images)
     *
     * @return static
     */
    public function gallery(): static
    {
        return $this
            ->label('Product Gallery')
            ->helperText('Upload multiple product images. All images will be converted to WebP format.')
            ->multiple()
            ->minFiles(1)
            ->maxFiles(10)
            ->reorderable()
            ->appendFiles();
    }

    /**
     * Configure for product thumbnail (single image)
     *
     * @return static
     */
    public function thumbnail(): static
    {
        return $this
            ->label('Product Thumbnail')
            ->helperText('Upload a main product image that will be used as thumbnail.')
            ->image()
            ->required()
            ->maxFiles(1);
    }

    /**
     * Set custom quality for WebP conversion
     *
     * @param int $quality
     * @return static
     */
    public function webpQuality(int $quality): static
    {
        $this->saveUploadedFileUsing(function (TemporaryUploadedFile $file, $component) use ($quality) {
            return $this->convertAndSaveAsWebPWithQuality($file, $quality);
        });

        return $this;
    }

    /**
     * Convert and save with custom quality
     *
     * @param TemporaryUploadedFile $file
     * @param int $quality
     * @return string
     */
    protected function convertAndSaveAsWebPWithQuality(TemporaryUploadedFile $file, int $quality): string
    {
        $uploadedFile = new UploadedFile(
            $file->getPathname(),
            $file->getClientOriginalName(),
            $file->getMimeType(),
            null,
            true
        );

        try {
            $webpPath = $this->imageService->convertToWebP($uploadedFile, 'products', $quality);
            $this->imageService->createThumbnail($webpPath, 300, 300, min($quality, 85));

            return $webpPath;

        } catch (\Exception $e) {
            Log::warning('WebP conversion failed: ' . $e->getMessage());
            return $file->store('products', 'public');
        }
    }
}
