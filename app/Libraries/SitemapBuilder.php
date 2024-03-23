<?php

namespace App\Libraries;

use Nette\Utils\Finder;

class SitemapBuilder
{

    protected mixed $inputDir;
    protected mixed $outputDir;

    public function __construct()
    {
        $this->inputDir = config('blog.content_dir');
        $this->outputDir = config('blog.output_dir');
    }

    public function build(): void
    {
        // create xml
        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>');

        // add home page
        $mainUrl = $xml->addChild('url');
        $mainUrl->addChild('loc', config('blog.url'));
        $mainUrl->addChild('changefreq', 'daily');
        $mainUrl->addChild('priority', '1.0');

        // get all files
        $this->addChildren($this->inputDir, $xml);

        // save
        $xml->asXML($this->outputDir . '/sitemap.xml');

    }

    public function addChildren($dir, $xml): void
    {
        $files = Finder::find('*')->in($dir);

        foreach ($files as $file) {
            if ($file->isDir())
                $this->addChildren($file->getPathname(), $xml);

            $this->addChild($file, $xml);
        }
    }

    public function addChild($file, $xml): void
    {
        if ($file->getBasename() !== 'index.md') {

            $slug = str_replace($this->inputDir, '', $file->getPathname());
            $slug = str_replace('.md', '', $slug);
            $slug = str_replace(DIRECTORY_SEPARATOR, '/', $slug);

            // add URLs for other files
            $url = $xml->addChild('url');
            $url->addChild('loc', rtrim(config('blog.url'), '/') . $slug . '/');
            $url->addChild('changefreq', 'daily');
            $url->addChild('priority', '0.8');
        }
    }

}