<?php

namespace App\Libraries;

use Dikki\Markdown\MarkdownParser;
use Symfony\Component\Yaml\Yaml;

class MarkdownContentParser
{
    protected string $contentDir;
    protected MarkdownParser $parser;
    protected TemplateRenderer $templateRenderer;

    public function __construct()
    {
        $this->contentDir = config('blog.content_dir');
        $this->parser = new MarkdownParser($this->contentDir);
        $this->templateRenderer = new TemplateRenderer();
    }

    public function get(string $file)
    {
        // get file
        $file = $this->parser->getFileContent($file, [
            '{ad0}' => \config('ads')[0],
            '{ad1}' => \config('ads')[1],
            '%7Bcdn%7D' => rtrim(\config('blog.cdn'), '/')
        ]);

        // match pattern

        $pattern = '/<p>\{card\|([^}]+)\}<\/p>/';

        // Perform the replacement using preg_replace_callback function
        $file['content'] = preg_replace_callback($pattern, function ($matches) {
            $cardNameVariable = $matches[1];
            $cardFilePath = rtrim(config('blog.cards_dir'), DS) . DS . $cardNameVariable . '.txt';
            if (!file_exists($cardFilePath)) {
                return "[Card not found: $cardNameVariable]";
            }
            $cardContent = $this->templateRenderer->render('_card', Yaml::parseFile($cardFilePath));
            return $cardContent;
        }, $file['content']);

        // return the array
        return $file;
    }

    public function getAll(string $folder)
    {
        return $this->parser->getFolderFiles($folder);
    }
}