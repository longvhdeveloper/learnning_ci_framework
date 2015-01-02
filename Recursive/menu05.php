<?php
require 'menu.php';
$data = array(
    array(
        'id' => 1,
        'name' => 'Menu 1',
        'parent' => 0
    ),

    array(
        'id' => 2,
        'name' => 'Menu 2',
        'parent' => '0'
    ),

    array(
        'id' => 3,
        'name' => 'Menu 3',
        'parent' => 0
    ),

    array(
        'id' => '4',
        'name' => 'Menu 1.1',
        'parent' => 1
    ),

    array(
        'id' => 5,
        'name' => 'Menu 1.2',
        'parent' => 1
    ),

    array(
        'id' => 6,
        'name' => 'Menu 2.1',
        'parent' => 2
    ),

    array(
        'id' => 7,
        'name' => 'Menu 2.2',
        'parent' => 2
    ),

    array(
        'id' => 8,
        'name' => 'Menu 1.2.1',
        'parent' => 5
    )
);

$config = array(
    'open' => '<ul class="test">',
    'close' => '</ul>',
    'openItem' => '<li>',
    'closeItem' => '</li>',
    'baseUrl' => 'javascript:void(0)'
);

$menu = new Menu($config);
$menu->setData($data);
echo $menu->callMenu();