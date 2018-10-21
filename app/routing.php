<?php
// routing.php
$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['edit', '/item/{id:\d+}/edit', 'GET'], //display edit form
        ['update', '/item/{id:\d+}/update', 'POST'], //update item in DB
        ['delete', '/item/{id:\d+}/delete', 'POST'], //delete an item
        ['add', '/item/add', 'POST'], // add an item
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method
    ],
    'Category' =>[
        ['index', '/category', 'GET'], //show all categories
        ['edit', '/category/{id:\d+}/edit', 'GET'], //display edit form
        ['update', '/category/{id:\d+}/update', 'POST'], //update category in DB
        ['delete', '/category/{id:\d+}/delete', 'POST'], //delete a category
        ['add', '/category/add', 'POST'], // add a category
        ['show', '/category/{id:\d+}', 'GET'], // show one category

    ]
];