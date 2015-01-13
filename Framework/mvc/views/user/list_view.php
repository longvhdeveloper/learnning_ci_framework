<table border="1" width="450" align="center">
    <thead>
    <tr>
        <th>STT</th>
        <th>Username</th>
        <th>Level</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach($data as $key => $value) {
        $key++;
        echo '<tr>';
        echo "<td>$key</td>";
        echo '<td>' . $value['username'] . '</td>';
        echo '<td>';
        if ($value['level'] == 1) {
            echo 'Member';
        } else {
            echo '<font color="red">Admin</font>';
        }
        echo '</td>';
        echo '<td><a href="index.php?controller=user&action=edit&uid='.$value['user_id'].'">Edit</a></td>';
        echo '<td><a href="index.php?controller=user&action=delete&uid='.$value['user_id'].'">Delete</a></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
