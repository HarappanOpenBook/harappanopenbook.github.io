<?php

return [
    // blog
    'name' => 'Harappan Open Book',
    'url' => 'https://harappanopenbook.github.io/',
    'cdn' => '',

    // content
    'content_dir' => ROOT_DIR . 'data' . DS . 'content' . DS . 'pages',
    'cards_dir' => ROOT_DIR . 'data' . DS . 'content' . DS . 'cards',
    'output_dir' => ROOT_DIR . 'docs',
    'assets_dir' => ROOT_DIR . 'data' . DS . 'assets',

    // menu
    'header_menu' => [
        '/' => '1. Start Here',
        '/discovery/' => '2. Discovery',
        '/nomenclature/' => '3. Nomenclature',
        '/extent/' => '4. Extent',
    ],
    'footer_menu' => [
        '/' => 'Home',
    ],
];