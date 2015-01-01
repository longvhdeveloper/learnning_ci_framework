<?php
$errors = array();
$username = '';
$password = '';
$level = 0;
if (isset($_POST['fsubmit'])) {
	if ($_POST['username'] == null) {
		$errors[] = 'Please enter username';
	} else {
		$username = $_POST['username'];
	}
	
	if ($_POST['password'] == null) {
		$errors[] = 'Please enter password';
	} else {
		$password = $_POST['password'];
	}
	
	$level = $_POST['level'];
	
	if ($username && $password && $level) {
		$mUser = new User();
		$mUser->setUsername($username);
		$mUser->setPassword($password);
		$mUser->setLevel($level);
		$mUser->insertUser();
		
		$errors[] = 'Insert thanh cong';
	}
}
require 'views/user/add_view.php';