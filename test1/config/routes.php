<?php

return array(

    'product/([0-9]+)' => 'product/view/$1', //productcontroller actionView
    'catalog' => 'catalog/index',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'category/([0-9]+)' => 'catalog/category/$1',
    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'cabinet' => 'cabinet/index',
    'cabinet/edit' => 'cabinet/edit',
    'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController
    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAdd в CartController
    'cart' => 'cart/index', // actionIndex в CartController

    '' => 'site/index',  //site controller action index
);

