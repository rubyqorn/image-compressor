<?php 

namespace Qonsillium\Imagick;

use Imagick;
use Qonsillium\File;

abstract class AbstractImagick
{
    /**
     * @var \Qonsillium\File
     */ 
    protected File $file;

    /**
     * @var Imagick 
     */ 
    protected Imagick $imagick;

    /**
     * Iniitiates AbstractImagick class and
     * sets files which have to be handled
     * @param \Qonsillium\File $file
     * @return void 
     */ 
    public function __construct(File $file)
    {
        $this->file = $file;
    }

    /**
     * @param Imagick $imagick
     * @return void 
     */ 
    public function setImagick(Imagick $imagick)
    {
        $this->imagick = $imagick;
    }

    /**
     * @return Imagick 
     */ 
    public function getImagick(): Imagick
    {
        return $this->imagick;
    }

    /**
     * Destroys AbstractImagick object
     * @return void 
     */ 
    public function __destruct()
    {
        unset($this->file);
    }

    /**
     * Reads image from file
     * @return bool 
     */
    abstract public function readImage();

    /**
     * Sets the image compression
     * @return bool
     */ 
    abstract public function setCompressionImage();

    /**
     * Sets the object's default compression quality
     * @return bool 
     */
    abstract public function setCompressionQuality();

    /**
     * Sets the format of a particular image
     * @return bool 
     */
    abstract public function setImageFormat();

    /**
     * Strips an image of all profiles and comments
     * @return bool 
     */
    abstract public function stripImage();

    /**
     * Writes an image to the specified filename
     * @return bool 
     */
    abstract public function writeImage();

    /**
     * Destroys ImageMagick instance
     * @return bool 
     */ 
    abstract public function destroy();
}
