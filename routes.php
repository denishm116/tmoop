<?php



return array(
    
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'task/show/([0-9]+)' => 'user/show/$1',
    'task/show' => 'task/show',
    'task/view' => 'task/view',
    'task/create' => 'task/create',
    'task/edit' => 'task/edit',
    'task/delete' => 'task/delete',

);


/*
return array(
        'user/([a-z]+)' => 'user/register',
    'user' => 'user/login',
    'task/show' => 'task/show',
    'task/create' => 'task/create',
    'task/edit' => 'task/edit',
    'task/delete' => 'task/delete',
    '' => 'task/show',
);
*/

