<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['add', '/item/add', 'GET'], // add an item
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method


    ],
    'Category' =>[
        ['index', '/categories', 'GET'], //show all categories
        ['add', '/category/add', 'GET'], // add a category
        ['show', '/category/{id:\d+}', 'GET'] // show one category

    ]
];