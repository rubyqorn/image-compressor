<?php 

use PHPUnit\Framework\TestCase;
use Qonsillium\Mimes\MimeTypesFactory;
use Qonsillium\File;

class MimeTypesFactoryTest extends TestCase
{
    public function testGetMimeTypeHelperReturnsFileInstance()
    {
        $factory = new MimeTypesFactory();
        $this->assertInstanceOf(
            File::class, $factory->getMimeTypeHelper('jpeg')
        );
    }
}
