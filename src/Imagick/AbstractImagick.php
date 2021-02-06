<?php 

namespace Qonsillium\Imagick;

use Imagick;

class AbstractImagick extends Imagick
{
    /**
     * Files list or single file name
     * @var string|array 
     */ 
    protected $files;

    /**
     * Iniitiates AbstractImagick class and
     * sets files which have to be handled
     * @param string|array $files
     * @return void 
     */ 
    public function __construct($files)
    {
        $this->files = $files;
    }
}
