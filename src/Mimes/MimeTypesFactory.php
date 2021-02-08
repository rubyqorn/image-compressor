<?php 

namespace Qonsillium\Mimes;

use Qonsillium\File;

class MimeTypesFactory
{
    /**
     * Factory method which returns mime type handler
     * by specified extension name
     * @param string $mimeType
     * @return \Qonsillium\File 
     */ 
    public function getMimeTypeHelper(string $mimeType): File
    {
        if ($mimeType === 'jpeg') {
            return new JPEGMimeType();
        }
    }
}
