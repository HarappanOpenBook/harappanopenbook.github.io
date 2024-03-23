<?php

namespace App\Libraries;

use Nette\Utils\FileSystem;
use Nette\Utils\Finder;

class PageBuilder
{

    protected mixed $inputDir;
    protected mixed $outputDir;
    protected MarkdownContentParser $markdownParser;
    protected SitemapBuilder $sitemapBuilder;

    public function __construct(protected TemplateRenderer $templateRenderer)
    {
        $this->inputDir = config('blog.content_dir');
        $this->outputDir = config('blog.output_dir');

        $this->markdownParser = new MarkdownContentParser();
    }


    public function build()
    {
        // build the dir
        $this->buildDir($this->inputDir);
    }

    
    public function buildDir(string $dir): void
    {
        $files = Finder::find('*')->in($dir);

        foreach ($files as $file) {
            if ($file->isDir()) {
                //$this->buildDir($file->getPathname());
            } else {
                $this->buildFile([
                    'file' => $file->getPathname(),
                    'extension' => $file->getFileInfo()->getExtension()
                ]);
            }
        }

    }

    /**
     * @throws \Throwable
     */
    public function buildFile(array $fileOptions): void
    {
        $extension = $fileOptions['extension'];
        $file = $fileOptions['file'];

        if ($extension === 'md') {
            $file = str_replace(rtrim($this->inputDir, DS) . DS, "", str_replace('.md', '', $file));
            $arr = $this->markdownParser->get($file);
        }

        # data
        $arr['lang'] = $arr['lang'] ?? 'en';
        $arr['canonical'] = rtrim(config('blog.url'), '/') . '/' . (($arr['slug'] === 'index') ? '' : $arr['slug'] . '/');

        if (isset ($arr['body'])) {
            $arr['content'] = $arr['body'];
        }

        # published and updated dates
        if (is_object($arr['published'])) {
            $arr['published'] = strtotime($arr['published']->format('Y-m-d'));
        }

        if (is_object($arr['updated'])) {
            $arr['updated'] = strtotime($arr['updated']->format('Y-m-d'));
        }

        $arr['meta'] = $arr;

        # render
        $html = $this->templateRenderer->render('template', $arr);

        # save
        $outputFile = $this->outputDir . '/' . $arr['slug'] . (($arr['slug'] === 'index') ? '.html' : '/index.html');
        FileSystem::write($outputFile, $html);
    }

}
