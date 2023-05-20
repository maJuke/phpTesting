<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/authors/index' => [[['_route' => 'authorsindex', '_controller' => 'App\\Controller\\AuthorController::index'], null, null, null, false, false, null]],
        '/authors/all' => [[['_route' => 'authorsallAuthors', '_controller' => 'App\\Controller\\AuthorController::allAuthors'], null, null, null, false, false, null]],
        '/authors/create' => [[['_route' => 'authorscreateAuthor', '_controller' => 'App\\Controller\\AuthorController::create'], null, null, null, false, false, null]],
        '/books/index' => [[['_route' => 'booksindex', '_controller' => 'App\\Controller\\BookController::index'], null, null, null, false, false, null]],
        '/books/all' => [[['_route' => 'booksallBooks', '_controller' => 'App\\Controller\\BookController::allBooks'], null, null, null, false, false, null]],
        '/books/create' => [[['_route' => 'bookscreateBook', '_controller' => 'App\\Controller\\BookController::create'], null, null, null, false, false, null]],
        '/main' => [[['_route' => 'main', '_controller' => 'App\\Controller\\MainController::index'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:35)'
                .'|/authors/show/([^/]++)(*:64)'
                .'|/books/show/([^/]++)(*:91)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        35 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        64 => [[['_route' => 'authorsshowAuthor', '_controller' => 'App\\Controller\\AuthorController::exactAuthor'], ['id'], null, null, false, true, null]],
        91 => [
            [['_route' => 'booksshowBook', '_controller' => 'App\\Controller\\BookController::exactBook'], ['id'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
