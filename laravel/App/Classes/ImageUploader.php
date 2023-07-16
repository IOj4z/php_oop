<?php

namespace App\Classes;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\RateLimiter;

class ImageUploader
{

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