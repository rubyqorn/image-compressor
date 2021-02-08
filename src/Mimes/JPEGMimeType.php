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
}
