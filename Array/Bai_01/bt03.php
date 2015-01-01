<?php
session_start();

$username = '';
$password = '';
$errors = array();
if (isset($_POST['fsubmit'])) {
    if ($_POST['username'] != '') {
        $username = (string) $_POST['username'];
    } else {
        $errors[] =  'Please enter username';
    }

    if ($_POST['password'] != '') {
        $password = (string) $_POST['password'];
    } else {
        $errors[] =  'Please enter password';
    }

    $users = array();
    $file = file('user.txt');

    foreach ($file as $content) {
        $arrContent = explode('|', $content);
        $users[] = array(
            'id' => $arrContent[0],
            'username' => $arrContent[1],
            'password' => $arrContent[2],
            'email' => $arrContent[3],
            'level' => $arrContent[4]
        );
    }

    $isLogin = 0;
    $isAdmin = 0;

    foreach ($users as $user) {
        if (trim($user['username']) == trim($username) && trim($user['password']) == trim($password)) {
            $isLogin = 1;
            $_SESSION['sess_username'] = $user['username'];
            $_SESSION['sess_level'] = $user['level'];
            header('location: index.php');
            exit();
        }
    }

    if ($isAdmin == 0) {
        $errors[] = 'Username or password not correct ! . Please try again';
    }
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . '<br/>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <form action="bt03.php" method="post">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" size="25" /></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" size="25" /></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="fsubmit" value="Login" /></td>
            </tr>
        </table>
    </form>
</body>
</html>