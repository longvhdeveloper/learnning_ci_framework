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

function recursiveMenu($data, $parent=0)
{
    if (isset($data[$parent])) {
        echo '<ul>';
        foreach ($data[$parent] as $item) {
            echo '<li>';
            $id = $item['id'];
            if (isset($data[$id])) {
                echo '<a href="#view'.$id.'">' . $item['name'] . '</a>';
            } else {
                echo '<a href="?id='.$id.'">' . $item['name'] . '</a>';
            }
            recursiveMenu($data, $id);
            echo '</li>';
        }
        echo '</ul>';
    }
}

recursiveMenu($menu);