<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List users</title>
    <style type="text/css">
        th{
            border: 1px solid blue;
            background: green;
            color: white;
        }
        td{
            border: 1px solid blue;
        }
    </style>
</head>
<body>
    <h1>List User information</h1>
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Username</th>
                <th>Level</th>
                <th>Edit</th>
                <th>Del</th>
            </tr>
        </thead>
        <tbody>
<?php
foreach ($users as $key => $user) {
    echo '<tr>';
    echo '<td>'.($key+1).'</td>';
    echo '<td>'.$user['username'].'</td>';
    echo '<td>'.($user['level'] == 1 ? 'Member' : '<font color="red">Administrator</font>').'</td>';
    echo '<td>Edit</td>';
    echo '<td>Del</td>';
    echo '</tr>';
}
?>
        </tbody>
    </table>
<?php echo $this->pagination->create_links(); ?>
</body>
</html>