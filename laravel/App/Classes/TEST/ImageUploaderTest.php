<?php

namespace App\Classes\TEST;

use App\Classes\ImageUploader;
use App\Classes\ThumbCreator;
use Illuminate\Support\Facades\Storage;
use Mockery;
use PHPUnit\Framework\TestCase;

class ImageUploaderTest extends TestCase
{
    public function testSomething()
    {
        $storageMock = Mockery::mock(Storage::class);
        $thumbCreatorMock = Mockery::mock(ThumbCreator::class);

        $imageUploader = new ImageUploader(
            $storageMock, $thumbCreatorMock
        );
        $imageUploader->upload('$imageUploader');
    }
}