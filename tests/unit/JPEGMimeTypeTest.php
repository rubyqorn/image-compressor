<?php 

use PHPUnit\Framework\TestCase;
use Qonsillium\Mimes\JPEGMimeType;

class JPEGMimeTypeTest extends TestCase
{
    public function testFilePathExistence()
    {
        $mime = new JPEGMimeType();
        $mime->setFilePath(__DIR__ . 'data/have_to_be_compressed.jpeg');

        $this->assertIsBool(
            $mime->validateFilePathExistence()
        );
    }

    public function testMimeTypeRespondingToHelperClass()
    {
        $mime = new JPEGMimeType();
        $mime->setFilePath(__DIR__ . 'data/have_to_be_compressed.jpeg');

        $this->assertIsBool(
            $mime->validateMimeType()
        );
    }

    public function testGetFileNameReturnsSameFileNameAsSetted()
    {
        $mime = new JPEGMimeType();
        $mime->setFilePath(__DIR__ . 'data/have_to_be_compressed.jpeg');

        $this->assertSame(
            'have_to_be_compressed.jpeg',
            $mime->getFileName()
        );
    }

    public function testSetterMethodsForImagickInstance()
    {
        $mime = new JPEGMimeType();
        $mime->setFilePath(__DIR__ . '/data/have_to_be_compressed.jpeg');
        $mime->setCompression(\Imagick::COMPRESSION_JPEG);
        $mime->setAfterCompressionFormat('webp');
        $mime->setQuality(80);
        $mime->setUploadFolder(__DIR__ . 'output/');

        $this->assertSame(
            __DIR__ . '/data/have_to_be_compressed.jpeg',
            $mime->getFilePath()
        );

        $this->assertSame(
            \Imagick::COMPRESSION_JPEG,
            $mime->getCompression()
        );

        $this->assertSame(
            'webp',
            $mime->getAfterCompressionFormat()
        );

        $this->assertSame(
            80,
            $mime->getQuality()
        );

        $this->assertSame(
            __DIR__ . 'output/',
            $mime->getUploadFolder()
        );
    }
}
