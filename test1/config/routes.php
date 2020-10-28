<?php

return array(
    '' => 'site/index', //site controller action index
    'product/([0-9]+)' => 'product/view/$1', //productcontroller actionView
    'catalog' => 'catalog/index',
    'category/([0-9]+)' => 'catalog/category/$1',
);

