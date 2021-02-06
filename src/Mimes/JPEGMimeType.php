<?php 

namespace Qonsillium\Mimes;

use Qonsillium\Contracts\MimeContract;
use Qonsillium\Imagick\AbstractImagick;

class JPEGMimeType implements MimeContract
{
    /**
     * Mime type which have to be
     * handled by this class
     * @var string 
     */ 
    private const MIME_TYPE = 'jpeg';

    /**
     * Absolute file path
     * @var string 
     */ 
    private string $filePath;

    /**
     * Imagick helper
     * @var \Qonsillium\Imagick\AbstractImagick 
     */ 
    private AbstractImagick $imagick;

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
    public function setImagickHelper(AbstractImagick $imagick)
    {
        $this->imagick = $imagick;
    }

    /**
     * {@inheritdoc} 
     */ 
    public function getImagickHelper(): AbstractImagick
    {
        return $this->imagick;
    }

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
        return in_array(self::MIME_TYPE, explode('.', $this->getFilePath())) ? true : false;
    }
}
