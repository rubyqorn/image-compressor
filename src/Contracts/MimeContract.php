<?php 

namespace Qonsillium\Contracts;

use Qonsillium\Imagick\AbstractImagick;

interface MimeContract
{
    /**
     * Sets file path which will be handled
     * @param string $path
     * @return void 
     */ 
    public function setFilePath(string $path);

    /**
     * Returns specified file path
     * @return string 
     */ 
    public function getFilePath(): string; 

    /**
     * Sets Imagick helper class
     * @param \Qonsillium\Imagick\AbstractImagick
     * @return void 
     */ 
    public function setImagickHelper(AbstractImagick $imagick);

    /**
     * Returns Imagick helper class 
     * @return \Qonsillium\Imagick\AbstractImagick
     */ 
    public function getImagickHelper(): AbstractImagick;

    /**
     * Validates file path for existence and
     * returns boolean data type depending on 
     * result
     * @return bool 
     */ 
    public function validateFilePathExistence(): bool;

    /**
     * Validates file mime type responding
     * for handler class name. Returns boolean
     * data type depending on result
     * @return bool 
     */ 
    public function validateMimeType(): bool;
}
