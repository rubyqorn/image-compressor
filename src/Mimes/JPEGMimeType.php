<?php 

namespace Qonsillium\Mimes;

use Qonsillium\File;

class JPEGMimeType extends File
{
    /**
     * Absolute file path
     * @var string 
     */ 
    private string $filePath;

    /**
     * Constant of Imagick compression
     * @var int  
     */ 
    private int $compressionConstant;

    /**
     * Quality between 1 and 100
     * @var int 
     */ 
    private int $quality;

    /**
     * Mime type
     * @var string 
     */ 
    private string $imageFormat;

    /**
     * Combination of folder and file names
     * @var string 
     */ 
    private string $folder;

    /**
     * Initiate JPEGMimeType constructor method
     * and sets jpeg format file for validation 
     */ 
    public function __construct()
    {
        static::$mimeType = 'jpeg';
    }

    /**
     * {@inheritdoc} 
     */ 
    public function setFilePath(string $path)
    {
        $this->filePath = $path;
    }

    /**
     * {@inheritdoc} 
     */ 
    public function getFilePath(): string
    {
        return $this->filePath;
    }

    /**
     * {@inheritdoc}
     */ 
    public function setCompression(int $compressionConstant)
    {
        $this->compressionConstant = $compressionConstant;
    }

    /**
     * {@inheritdoc}
     */ 
    public function getCompression(): int
    {
        return $this->compressionConstant;
    }

    /**
     * {@inheritdoc}
     */ 
    public function setQuality(int $quality)
    {
        $this->quality = $quality;
    }

    /**
     * {@inheritdoc}
     */ 
    public function getQuality(): int
    {
        return $this->quality;
    }

    /**
     * {@inheritdoc}
     */ 
    public function setAfterCompressionFormat(string $format)
    {
        $this->imageFormat = $format;
    }

    /**
     * {@inheritdoc}
     */ 
    public function getAfterCompressionFormat(): string
    {
        return $this->imageFormat;
    }

    /**
     * {@inheritdoc}
     */ 
    public function setUploadFolder(string $folder)
    {
        $this->folder = $folder;
    }

    /**
     * {@inheritdoc}
     */ 
    public function getUploadFolder(): string
    {
        return $this->folder;
    }
}
