<?php 

namespace Qonsillium;

use Qonsillium\Mimes\MimeTypesFactory;

class Compressor
{
    /**
     * List or single file
     * @var array|string 
     */ 
    private $files;

    /**
     * @var \Qonsillium\Mimes\MimeTypesFactory 
     */ 
    private MimeTypesFactory $mimesFactory;

    /**
     * Transformed files paths in mime
     * type helpers
     * @var array
     */ 
    protected array $trasnformedFiles;

    /**
     * Initiates Compressor constructor method
     * and sets files list or single file which will be
     * handled by this class
     * @param string|array $files
     * @return void 
     */ 
    public function __construct($files)
    {
        $this->mimesFactory = new MimeTypesFactory();
        $this->files = $files;
    }

    /**
     * Have to be resolved. Because violates SRP
     * SOLID methodology
     * @param string $filePath
     * @return string 
     */ 
    public function getFileExtension(string $filePath)
    {
        return pathinfo($filePath, PATHINFO_EXTENSION);
    }

    /**
     * Returns mime type helper by extension file name
     * @param string $extension
     * @return \Qonsillium\File 
     */ 
    protected function getMimeTypeHelper(string $extension): File
    {
        return $this->mimesFactory->getMimeTypeHelper($extension);
    }
 
    /**
     * Transform file paths in mime type helpers
     * @return void 
     */ 
    public function transform()
    {
        foreach($this->files as $filePath) {
            $this->trasnformedFiles[] = $this->getMimeTypeHelper(
                $this->getFileExtension($filePath)
            );
        }
    }
}
