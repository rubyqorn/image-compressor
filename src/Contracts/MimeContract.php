<?php 

namespace Qonsillium\Contracts;

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

    /**
     * Sets compression type. Only can be used imagemagick
     * lib constants or integer equivalents. For example 
     * COMPRESSION_JPEG.
     * @see https://www.php.net/manual/en/imagick.constants.php. Compression constants
     * @return void 
     */ 
    public function setCompression(int $compressionConstant);

    /**
     * Returns value of setted compression constant
     * @return int 
     */ 
    public function getCompression(): int;

    /**
     * Sets compression quality between 1 and 100,
     * where 1 is highest and 100 is lowest
     * @param int $quality
     * @return void
     */ 
    public function setQuality(int $quality);

    /**
     * Returns setted compression quality integer 
     * value.
     * @return int 
     */ 
    public function getQuality(): int;

    /**
     * Sets mime type for handled file
     * @param string $format
     * @return void 
     */ 
    public function setAfterCompressionFormat(string $format);

    /**
     * Returns mime type for file which have to be 
     * transformated after compression 
     * @return string
     */ 
    public function getAfterCompressionFormat(): string;

    /**
     * Sets combination of folder and file name
     * which have to be stored after compression.
     * For example compression.jpeg -> compressed/compression.jpg
     * @param string $folder
     * @return void 
     */ 
    public function setUploadFolder(string $folder);

    /**
     * Returns setted combination of compressed file
     * and folder
     * @return string 
     */ 
    public function getUploadFolder(): string;
}
