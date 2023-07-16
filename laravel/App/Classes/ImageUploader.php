<?php

namespace App\Classes;


use Illuminate\Http\UploadedFile;

class ImageUploader
{

    /**
     * @returns bool|string
     */
    public function upload(
        UploadedFile $file,
        string $folder,
        bool $dontBan = false
    ): bool|string {
        if ($dontBan) {
            $this->banUser(\Auth::user());
            return false;
        }
        if ($file) {
            return $folder . '..........';
        }
        return false;
    }

}