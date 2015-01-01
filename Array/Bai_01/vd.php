<?php
$arr = array(
    "person" => array(
        "name" => 'jackie',
        'job' => 'developer'
    )
);

echo '<pre>';
print_r($arr);
echo '</pre>';

echo $arr['person']['job'];


$str = "PHP|Java|Ruby";
$arr2 = explode('|', $str);

$str2 = implode('-', $arr2);
echo '<hr/>';
$str3 = serialize($arr);
echo $str3;

$arr3 = unserialize($str3);

echo '<pre>';
print_r($arr3);
echo '</pre>';