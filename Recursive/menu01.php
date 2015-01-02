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

function recursive($data, $parent = 0, $text = '', $selected = 0)
{
    foreach ($data as $key => $value) {
        if ($value['parent'] == $parent) {
            $id = $value['id'];
            if ($selected > 0 && $id == $selected) {
                echo '<option selected="selected" value="'.$item['id'].'">' . $text . $value['name'] . '</option>';
            } else {
                echo '<option value="'.$item['id'].'">' . $text . $value['name'] . '</option>';
            }
            
            unset($data[$key]);
            recursive($data, $id, $text . '--', $selected);
        }
    }
}
echo '<select>';
recursive($data, 0, '', 7);
echo '</select>';