<?php
session_start();
if ($_SESSION['sess_level'] != 2) {
	header('location:index.php');
	exit();
} 
$id = (int) $_GET['id'];
$file = file('user.txt');
$userInfo = array();
$keyId = 0;
foreach ($file as $key => $item) {
	$dataId = substr($item, 0, strpos($item, '|'));
	$data = explode('|', $item);
	if ((int)$dataId == $id) {
		$userInfo = array(
			'id' => trim($data[0]),
			'username' => trim($data[1]),
			'password' => trim($data[2]),
			'email' => trim($data[3]),
			'level' => trim($data[4])
		);
		
		$keyId = $key;
		break;
	}
}

if (isset($_POST['fsubmit'])) {
	$username = '';
	$email = '';
	$level = 0;
	
	if ($_POST['username'] == '') {
		$errors[] = 'Please enter username.';
	} else {
		$username = (string) $_POST['username'];
	}
	
	if ($_POST['email'] == '') {
		$errors[] = 'Please enter email.';
	} else {
		$email = (string) $_POST['email'];
	}
	
	$level = (int) $_POST['level'];
	
	if ($username && $email && $level) {
		
		$userInfo['username'] = $username;
		$userInfo['email'] = $email;
		$userInfo['level'] = $level;
		
		$file[$keyId] = implode(' | ', $userInfo);
	
		file_put_contents('user.txt', $file);
	
		header('location:index.php');
	}
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Edit user</title>
</head>
<body>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username" size="25" value="<?php echo $userInfo['username'];?>" /></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" size="25" /></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" size="25" value="<?php echo $userInfo['email'];?>"/></td>
			</tr>
			<tr>
				<td>Level</td>
				<td><select name="level">
						<option <?php if($userInfo['level'] == 1){ echo 'selected="selected"'; } ?> value="1">Member</option>
						<option <?php if($userInfo['level'] == 2){ echo 'selected="selected"'; } ?> value="2">Administrator</option>
				</select></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="fsubmit" value="Edit" /></td>
			</tr>
		</table>
	</form>
</body>
</html>