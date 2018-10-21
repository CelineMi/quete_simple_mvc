<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['edit', '/item/{id:\d+}/edit', 'GET'], //display edit form
        ['update', '/item/{id:\d+}/update', 'POST'], //update item in DB
        ['delete', '/item/{id:\d+}/delete', 'POST'], //delete an item
        ['add', '/item/add', ['GET', 'POST']], // add an item
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method
    ],
    'Category' =>[
        ['index', '/categories', 'GET'], //show all categories
        ['add', '/category/add', 'GET'], // add a category
        ['show', '/category/{id:\d+}', 'GET'], // show one category

    ]
];