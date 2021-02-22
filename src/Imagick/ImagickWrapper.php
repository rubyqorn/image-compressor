<?php

namespace Qonsillium\Imagick;

class ImagickWrapper extends AbstractImagick
{
    /**
     * @return string 
     */ 
    protected function getFileName(): string
    {
        return $this->file->getFilePath();
    }

    /**
     * @return int 
     */ 
    protected function getFileCompression(): int
    {
        return $this->file->getCompression();
    }

    /**
     * @return int 
     */ 
    protected function getFileQuality(): int
    {
        return $this->file->getQuality();
    }

    /**
     * @return string 
     */ 
    protected function getMimeTypeAfterCompressed(): string
    {
        return $this->file->getAfterCompressionFormat();
    }

    /**
     * @return string 
     */ 
    protected function getUploadFolder(): string
    {
        return $this->file->getUploadFolder();
    }

    /**
     * {@inheritdoc}
     */ 
    public function readImage()
    {
        return $this->getImagick()->readImage($this->getFileName());
    }

    /**
     * {@inheritdoc}
     */ 
    public function setCompressionImage()
    {
        return $this->getImagick()->setImageCompression($this->getFileCompression());
    }

    /**
     * {@inheritdoc}
     */ 
    public function setCompressionQuality()
    {
        return $this->getImagick()->setImageCompressionQuality($this->getFileQuality());
    }

    /**
     * {@inheritdoc} 
     */ 
    public function setImageFormat()
    {
        return $this->getImagick()->setImageFormat($this->getMimeTypeAfterCompressed());
    }

    /**
     * {@inheritdoc}
     */ 
    public function stripImage()
    {
        return $this->getImagick()->stripImage();
    }

    /**
     * {@inheritdoc}
     */ 
    public function writeImage()
    {
        return $this->getImagick()->writeImage($this->getUploadFolder());
    }

    /**
     * {@inheritdoc}
     */ 
    public function destroy()
    {
        return $this->getImagick()->destroy();
    }
}
