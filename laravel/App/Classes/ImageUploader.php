<?php

namespace App\Classes;


use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

final class ImageUploader
{
    /**
     * @var Storage
     */
    private $storage;

    /**
     * @var ThumbCreator
     */
    private $thumbCreator;

    /**
     * @param Storage $storage
     * @param ThumbCreator $thumbCreator
     */
    public function __construct(Storage $storage, ThumbCreator $thumbCreator)
    {
        $this->storage = $storage;
        $this->thumbCreator = $thumbCreator;
    }


    public function uploadAvatar(User $user, UploadedFile $file): void
    {
        $avatarFileName = 'uploads';
        Storage::disk('s3')->put($avatarFileName, $file);

        $user->avatarUrl = $avatarFileName;
    }

    /**
     * @returns bool|string
     */
    public function upload(string $fileName, UploadedFile $file): void
    {
        $this->thumbCreator->upload($fileName, $file);
        $this->storage->disk('s3')->put($fileName, $file);
    }

}