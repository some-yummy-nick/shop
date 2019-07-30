<?php
return [
    '' => 'category/index',
    'about'   => 'site/about',
    'category/<id:\d+>/page/<page:\d+>'   => 'category/view',
    'category/<id:\d+>'   => 'category/view',
    'product/<id:\d+>'   => 'product/view',
];
