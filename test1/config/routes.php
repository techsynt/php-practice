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
    '' => 'site/index',  //site controller action index
);

