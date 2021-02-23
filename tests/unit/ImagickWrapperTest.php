<?php 

use PHPUnit\Framework\TestCase;
use Qonsillium\Imagick\ImagickWrapper;
use Qonsillium\Mimes\JPEGMimeType;
use Qonsillium\File;
use Qonsillium\Imagick\AbstractImagick;

class ImagickWrapperTest extends TestCase
{
    protected File $mime;

    protected Imagick $imagick;

    protected AbstractImagick $wrapper;

    public function setUp(): void
    {
        $this->mime = new JPEGMimeType();
        $this->mime->setFilePath(__DIR__ . '/data/have_to_be_compressed.jpeg');
        $this->mime->setCompression(\Imagick::COMPRESSION_JPEG);
        $this->mime->setQuality(70);
        $this->mime->setAfterCompressionFormat('webp');
        $this->mime->setUploadFolder(__DIR__ . '/output/have_to_be_compressed.webp');

        $this->imagick = new \Imagick();
        $this->wrapper = new ImagickWrapper($this->mime);
    }

    public function testImagickGetterReturnsSameInstance()
    {
        $this->wrapper->setImagick($this->imagick);
        
        $this->assertSame(
            $this->imagick,
            $this->wrapper->getImagick()
        );
    }

    public function testCycleOfCompressionUsingImagickLibrary()
    {
        $this->wrapper->setImagick($this->imagick);

        $this->assertIsBool($this->wrapper->readImage());
        $this->assertIsBool($this->wrapper->setCompressionImage());
        $this->assertIsBool($this->wrapper->setCompressionQuality());
        $this->assertIsBool($this->wrapper->setImageFormat());
        $this->assertIsBool($this->wrapper->stripImage());
        $this->assertIsBool($this->wrapper->writeImage());
        $this->assertIsBool($this->wrapper->destroy());

        // Delete compressed image
        //unlink(__DIR__ . '/output/have_to_be_compressed.webp');
    }

    public function tearDown(): void
    {
        unset($this->mime);
        unset($this->imagick);
        unset($this->wrapper);
    }
}
