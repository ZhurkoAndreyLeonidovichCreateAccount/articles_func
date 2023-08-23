<?php
return (function(){
    return [
        [
            'test' => '/^\/?$/',
            'controller' => 'articles/index',
            'params' => []
        ],
        [
            'test' => '/^articles\/add\/?$/',
            'controller' => 'articles/add',
            'params' => []
        ],
        [
            'test' => '/^articles\/article\/([1-9]+\d*)\/?$/',
            'controller' => 'articles/article',
            'params' => ['id' =>1]
        ],
        [
            'test' => '/^articles\/edit\/([1-9]+\d*)\/?$/',
            'controller' => 'articles/edit',
            'params' => ['id' =>1]
        ],
        [
            'test' => '/^articles\/delete\/([1-9]+\d*)\/?$/',
            'controller' => 'articles/delete',
            'params' => ['id' =>1]
        ],
        [
            'test' => '/^categories\/all\/?$/',
            'controller' => 'categories/all',
            'params' => []
        ],
        [
            'test' => '/^categories\/add\/?$/',
            'controller' => 'categories/add',
            'params' => []
        ],

        [
            'test' => '/^categories\/delete\/([1-9]+\d*)\/?$/',
            'controller' => 'categories/delete',
            'params' => ['id' => 1]
        ],
        [
            'test' => '/^categories\/edit\/([1-9]+\d*)\/?$/',
            'controller' => 'categories/edit',
            'params' => ['id' => 1]
        ],
        [
            'test' => '/^categories\/allArticlesByCategory\/([1-9]+\d*)\/?$/',
            'controller' => 'categories/allArticlesByCategory',
            'params' => ['id' => 1]
        ],
        [
            'test' => '/^categories\/category\/([1-9]+\d*)\/?$/',
            'controller' => 'categories/category',
            'params' => ['id' => 1]
        ],
        [
            'test' => '/^auth\/login$/',
            'controller' => 'auth/login',
            'params' => []
        ],
        [
            'test' => '/^auth\/logout$/',
            'controller' => 'auth/logout',
            'params' => []
        ],

        [
            'test' => '/^auth\/register$/',
            'controller' => 'auth/register',
            'params' => []
        ]
    ];
})();
