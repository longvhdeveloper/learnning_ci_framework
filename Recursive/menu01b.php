<?php
$db = mysql_connect('localhost', 'root', 'root');
mysql_select_db('teamcrop', $db);

$sql = 'select * from lit_sale_product_category where c_id = 1';
$stmt = mysql_query($sql);

$menu = array();
while ($row = mysql_fetch_assoc($stmt)) {
    $menu[] = array(
        'id' => $row['pc_id'],
        'name' => $row['pc_name'],
        'parent' => $row['pc_parentid']
    );
}

function recursiveMenu($menu, $parent = 0, $text = '')
{
    foreach ($menu as $item) {
        if ((int)$item['parent'] == $parent) {
            echo $text . $item['name'] . '<br/>';
            $id = $item['id'];
            recursiveMenu($menu, $id, $text.'--');
        }
    }
}

recursiveMenu($menu);