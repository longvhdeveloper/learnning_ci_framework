<?php
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

$newArr = array();

foreach ($data as $value) {
    $parent = $value['parent'];
    $newArr[$parent][] = $value;
}

function recursive($data, $parent = 0)
{
    if (isset($data[$parent])) {
        echo '<ul>';
        foreach ($data[$parent] as $value) {
            $id = $value['id'];
            echo '<li>';
            if (!isset($data[$id])) {
                echo '<a href="#">' . $value['name'] . '</a>';
            } else {
                echo '<a href="#view'.$id.'">' . $value['name'] . '</a>';
            }
            recursive($data, $id);
            echo '</li>';
        }
        echo '</ul>';
    }
}

/*foreach ($newArr[0] as $value2) {
 echo $value2['name'] . '<br/>';
 $id = $value2['id'];
 if (isset($newArr[$id])) {
 foreach ($newArr[$id] as $value3) {
 echo '--' . $value3['name'] . '<br/>';
 $id2 = $value3['id'];
 if (isset($newArr[$id2])) {
 foreach ($newArr[$id2] as $value4) {
 echo '----' . $value4['name'] . '<br />';
 }
 }
 }
 }
 }*/
recursive($newArr);