<?php
function callMenu($data, $parent = 0, $text='', $selected = 0)
{
    foreach ($data as $key => $item) {
        if ($item['parent'] == $parent) {
            $id = $item['id'];
            $item['name'] = $text . $item['name'];
            if ($selected != 0 && $id == $selected) {
                echo '<option selected value="'.$item['id'].'">'.$item['name'].'</option>';
            } else {
                echo '<option value="'.$item['id'].'">'.$item['name'].'</option>';
            }
            unset($data[$key]);
            callMenu($data, $id, $text.'--', $selected);
        }
    }
}