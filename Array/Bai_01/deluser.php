<?php
$id = $_GET['id'];
$file = file('user.txt');
foreach ($file as $key => $item) {
	$dataId = substr($item, 0, strpos($item, '|'));
	if ((int)$id == (int)$dataId) {
		$file[$key] = '';
		break;
	}
}
file_put_contents('user.txt', $file);
header('location: index.php');