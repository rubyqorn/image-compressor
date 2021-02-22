<?php 

namespace Qonsillium;

use Qonsillium\Imagick\ImagickWrapper;
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
     * Constant of Imagick class
     * @var int 
     */ 
    protected int $type;

    /**
     * Quality of image 
     * @var int  
     */ 
    protected int $quality;

    /**
     * File format
     * @var string 
     */ 
    protected string $format;

    /**
     * Storage name where contains
     * compressed files
     * @var string 
     */ 
    protected string $storage;

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
            $helper = $this->getMimeTypeHelper(
                $this->getFileExtension($filePath)
            );

            $helper->setFilePath($filePath);
            $this->trasnformedFiles[] = $helper;
        }
    }

    /**
     * Sets compression constants of ImageMagick
     * php lib
     * @param int $type
     * @return void 
     */ 
    public function setType(int $type)
    {   
        $this->type = $type;
    }

    /**
     * Returns compression type
     * @return int 
     */ 
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * Sets compression quality. Can be only
     * between 0 and 100 
     * @param int $quality
     * @return void
     */ 
    public function setQuality(int $quality)
    {
        $this->quality = $quality;
    }

    /**
     * Returns file compression quality
     * @return int 
     */ 
    public function getQuality(): int
    {
        return $this->quality;
    }

    /**
     * Sets file format when file must be 
     * converted after compression
     * @param string $format
     * @return void 
     */ 
    public function setFileFormat(string $format)
    {
        $this->format = $format;
    }

    /**
     * Returns file format when file must be
     * converted after compression
     * @return string 
     */ 
    public function getFileFormat(): string
    {
        return $this->format;
    }

    /**
     * Sets storage where will be contains
     * compressed files
     * @param string $folder
     * @return void 
     */ 
    public function setStorageFolder(string $folder)
    {
        $this->storage = $folder;
    }

    /**
     * Returns storage name where contains compressed
     * files
     * @return string 
     */ 
    public function getStorageFolder(): string
    {
        return $this->storage;
    }

    /**
     * Compress files passed to constructor
     * method with specialized quality, format and
     * in specific folder
     * @return void
     */ 
    public function compress()
    {
        $this->transform();

        foreach($this->trasnformedFiles as $file) {
            $file->setCompression($this->getType());
            $file->setQuality($this->getQuality());
            $file->setAfterCompressionFormat($this->getFileFormat());
            $file->setUploadFolder("{$this->getStorageFolder()}{$file->getFileName()}");

            $imagick = new ImagickWrapper($file);
            $imagick->setImagick(new \Imagick());
            $imagick->readImage();
            $imagick->setCompressionImage();
            $imagick->setCompressionQuality();
            $imagick->setImageFormat();
            $imagick->stripImage();
            $imagick->writeImage();
            $imagick->destroy();
        }
    }
}
