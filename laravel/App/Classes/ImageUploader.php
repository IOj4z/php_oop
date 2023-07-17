<?php

namespace App\Classes;


use App\Interface\StorageInterface;
use App\Interface\ThumbCreatorInterface;
use App\Models\User;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

final class ImageUploader
{
    /** @var GoogleVisionClient */
    private $googleVision;
    /** @var FileSystemManager */
    private $fileSystemManager;

    public function __construct(GoogleVisionClient $googleVision, FileSystemManager $fileSystemManager)
    {
        $this->googleVision = $googleVision;
        $this->fileSystemManager = $fileSystemManager;
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
    public function upload(
        UploadedFile $file,
        string $folder,
        bool $dontBan = false,
        bool $weakerRules = false,
        int $banThreshold = 5
    ) {
        $fileContent = $file->getContents();

        if ('check failed') {
            if (!$dontBan) {
                if (RateLimiter::class, $banThreshold)){
                    $this->banUser(Auth::user());
                }
            }
            return false;
        }

        $fileName = $folder . 'some_unique_file_name.jpg';

        $this->fileSystemManager
            ->disk('')
            ->put($fileName, $fileContent);

        return $fileName
    }

    private function banUser(User $user)
    {
        $user->banned = true;
        $user->save();
    }

}