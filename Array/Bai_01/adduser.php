<?php
session_start();
if ($_SESSION['sess_level'] != 2) {
	header('location: index.php');
}

$username = '';
$password = '';
$email = '';
$level = 0;
$errors = array();
if (isset($_POST['fsubmit'])) {
	if ($_POST['username'] == '') {
		$errors[] = 'Please enter username.';
	} else {
		$username = (string) $_POST['username'];
	}
	
	if ($_POST['password'] == '') {
		$errors[] = 'Please enter password.';
	} else {
		$password = (string) $_POST['password'];
	}
	
	if ($_POST['email'] == '') {
		$errors[] = 'Please enter email.';
	} else {
		$email = (string) $_POST['email'];
	}
	
	$level = (int) $_POST['level'];
	
	if ($username && $password && $email && $level) {
		$file = file('user.txt');
		
		//$lastItem = $file[count($file) - 1];
		$lastItem = end($file);
		$lastId = substr($lastItem, 0, strpos($lastItem, '|'));
		
		$file[] = "\n" . ($lastId + 1) . ' | ' . $username . ' | ' . $password . ' | ' . $email . ' | ' . $level;

		file_put_contents('user.txt', $file);
		
		header('location:index.php');
		exit();
	}
}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Add user</title>
</head>
<body>
<?php
if (!empty($errors)) {
	echo '<ul>';
	foreach ($errors as $error) {
		echo '<li>' . $error . '</li>';
	}
	echo '</ul>';
} 
?>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" size="25" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" size="25" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" size="25" /></td>
			</tr>
			<tr>
				<td>Level</td>
				<td>
					<select name="level">
						<option value="1">Member</option>
						<option value="2">Administrator</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="fsubmit" value="Add" /></td>
			</tr>
		</table>
	</form>
</body>
</html>