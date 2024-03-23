<?php

return [
    // blog
    'name' => 'Naman Kumar',
    'url' => 'https://localhost:11111/',
    'cdn' => '',

    // content
    'content_dir' => ROOT_DIR . 'content' . DS . 'pages',
    'cards_dir' => ROOT_DIR . 'content' . DS . 'cards',
    'output_dir' => ROOT_DIR . '_html',
    'assets_dir' => ROOT_DIR . 'assets',

    // menu
    'header_menu' => [
        '/' => '1. Start Here',
        '/about-upsc/' => '2. About UPSC',
        '/how-to-start-upsc-preparation/' => '3. How to start UPSC preparation',
        '/resources/' => '4. Resources',
        '/dos-and-donts/' => '5. Dos and Donts',
    ],
    'footer_menu' => [
        '/' => 'Home',
    ],
];