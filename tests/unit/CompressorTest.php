<?php 

use PHPUnit\Framework\TestCase;
use Qonsillium\Compressor;
use Qonsillium\File;

class CompressorTest extends TestCase
{
    protected Compressor $compressor;

    public function setUp(): void
    {
        $this->compressor = new Compressor([
            __DIR__ . '/data/have_to_be_compressed.jpeg' 
        ]);
    }

    public function testGetFileExtensionReturnsSame()
    {
        $this->assertSame(
            'jpeg',
            $this->compressor->getFileExtension(
                __DIR__ . '/data/have_to_be_compressed.jpeg' 
            )
        );
    }

    public function testTransformReturnsHelpers()
    {
        $reflection = new ReflectionClass($this->compressor);
        $this->compressor->transform();
        $property = $reflection->getProperty('trasnformedFiles');
        $property->setAccessible(true);

        foreach($property->getValue($this->compressor) as $helper) {
            $this->assertInstanceOf(
                File::class,
                $helper
            );
        }
    }
}
