<?php

namespace App\Libraries;

use League\Plates\Engine;

class TemplateRenderer
{

    protected Engine $engine;

    public function __construct()
    {
        $this->engine = new Engine(ROOT_DIR . 'views');

        $this->engine->registerFunction('meta', function($meta){

        });
    }

    public function render(string $template, array $data = []): string
    {
        return $this->engine->render($template, $data);
    }

}