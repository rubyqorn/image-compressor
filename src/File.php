<?php 

namespace Qonsillium;

use Qonsillium\Contracts\MimeContract;

abstract class File implements MimeContract
{
    /**
     * Mime type of file which will be 
     * handled
     * @var string
     */ 
    static protected string $mimeType;

    /**
     * {@inheritdoc} 
     */
    public function validateFilePathExistence(): bool
    {
        return file_exists($this->getFilePath()) ? true : false;
    }

    /**
     * {@inheritdoc} 
     */ 
    public function validateMimeType(): bool
    {
        return in_array(static::$mimeType, explode('.', $this->getFilePath())) ? true : false;
    }

    /**
     * Returns file name from full path
     * @return string 
     */ 
    public function getFileName()
    {
        $parsed = explode('/', $this->getFilePath());
        return array_pop($parsed);
    }
}
