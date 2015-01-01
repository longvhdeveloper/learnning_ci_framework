<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List User</title>
</head>
<body>
<?php
if (isset($_SESSION['sess_username'])) {
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
?>
<table border="1" width="100%">
    <thead>
    	<tr><th colspan="6"><a href="adduser.php">Add user</a></th></tr>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Password</td>
            <td>Email</td>
            <td>Level</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
            echo '<tr>';
            echo '<td>' . $user['id'] . '</td>';
            echo '<td>' . $user['username'] . '</td>';
            echo '<td>' . $user['password'] . '</td>';
            echo '<td>' . $user['email'] . '</td>';
            echo '<td>' . ($user['level'] == 2 ? 'admin' : 'menber') . '</td>';
            echo '<td>';
            if ($_SESSION['sess_level'] == 2) {
                echo '<a href="edituser.php?id='.$user['id'].'">Edit</a>&nbsp;';
                echo '<a href="deluser.php?id='.$user['id'].'">Delete</a>';
            }
            echo '</td>';
            echo '</tr>';
        }
        ?>
    </tbody>
</table>
<?php
}
?>
</body>
</html>