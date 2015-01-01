<?php
$arr = array(
    'name' =>  'jackie',
    'email' => 'vohoanglong07@gmail.com',
    'job' => 'developer'
);

$key = array_keys($arr);

echo '<pre>';
print_r($key);
echo '</pre>';

$value = array_values($arr);

echo '<pre>';
print_r($value);
echo '</pre>';

$file = file('account.txt');
echo '<pre>';
print_r($file);
echo '</pre>';