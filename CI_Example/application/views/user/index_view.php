<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List user</title>
    <style>
        td{
        border: 1px solid blue;
    }
    .title{
        border: 1px solid blue;
        background: blue;
        color: #fff;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <table style="width:450px;margin:0px auto;">
        <thead>
            <tr>
                <th class="title">STT</th>
                <th class="title">Username</th>
                <th class="title">Level</th>
                <th class="title">Edit</th>
                <th class="title">Del</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach($users as $key => $user) {
    echo '<tr>';
    echo '<td>'.($key + 1).'</td>';
    echo '<td>'.$user['username'].'</td>';
    $level = $user['level'] == 1 ? 'Member' : '<font color="red">Administrator</font>';
    echo '<td>'.$level.'</td>';
    echo '<td><a href="index.php/user/edit/id/'.$user['user_id'].'">Edit</a></td>';
    echo '<td><a href="index.php/user/del/id/'.$user['user_id'].'">Del</a></td>';
    echo '</tr>';
}
?>
        </tbody>
    </table>
</body>
</html>