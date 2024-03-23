<?php

namespace App\Libraries;

use Nette\Utils\FileSystem;

class AssetsBuilder
{

    protected $outputDir;

    public function __construct()
    {
        $this->outputDir = config('blog.output_dir');
    }

    public function build()
    {
        // if outputDir exists, delete it and then create again and make it writable
        FileSystem::delete($this->outputDir);
        FileSystem::createDir($this->outputDir);
        FileSystem::makeWritable($this->outputDir);

        // copy publicDir to outputDir
        FileSystem::copy(config('blog.assets_dir'), $this->outputDir);
    }

}