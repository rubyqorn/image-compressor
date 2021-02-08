<?php 

namespace Qonsillium\Imagick;

use Imagick;
use Qonsillium\File;

class AbstractImagick extends Imagick
{
    /**
     * @var \Qonsillium\File
     */ 
    protected File $file;

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
     * Destroys AbstractImagick object
     * @return void 
     */ 
    public function __destruct()
    {
        unset($this->file);
        $this->destroy();
    }
}
