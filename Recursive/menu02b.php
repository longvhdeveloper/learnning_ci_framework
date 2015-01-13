<?php
$db = mysql_connect('localhost', 'root', 'root');
mysql_select_db('teamcrop', $db);

$sql = 'select * from lit_sale_product_category where c_id = 1';
$stmt = mysql_query($sql);

$menu = array();
while ($row = mysql_fetch_assoc($stmt)) {
    $menu[$row['pc_parentid']][] = array(
        'id' => $row['pc_id'],
        'name' => $row['pc_name'],
        'parent' => $row['pc_parentid']
    );
}

function recursiveMenu($menu, $parent= 0, $text = '')
{
    if (isset($menu[$parent])) {
        foreach ($menu[$parent] as $item) {
            echo $text . $item['name'] . '<br />';
            $id = $item['id'];
            recursiveMenu($menu, $id, $text. '--');
        }
    }
}

recursiveMenu($menu);