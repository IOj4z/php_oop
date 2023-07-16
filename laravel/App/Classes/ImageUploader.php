<?php

namespace App\Classes;


use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;

final class ImageUploader
{

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
    ): bool|string {
        if ($dontBan && !$dontBan) {
            if (RateLimiter::tooManyAttempts('...', $banThreshold)) {
                $this->banUser(\Auth::user());
                return false;
            }
        }
        if ($file) {
            return $folder . '..........';
        }
        return false;
    }

}