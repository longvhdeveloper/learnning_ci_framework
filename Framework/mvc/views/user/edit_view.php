<?php
if (!empty($data['error'])) {
    echo '<ul>';
    foreach ($data['error'] as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>
<form action="index.php?controller=user&action=edit&uid=<?php echo $data['data']['user_id'] ?>" method="post">
    Level : <select name="level">
        <option <?php if($data['data']['level'] == 1) {echo 'selected="selected"';} ?> value="1">Member</option>
        <option <?php if($data['data']['level'] == 2) {echo 'selected="selected"';} ?> value="2">Administrator</option>
    </select>
    <br/>
    Username : <input type="text" name="username" size="25" value="<?php echo $data['data']['username'] ?>"><br/>
    Password : <input type="password" name="password" size="25"><br/>
    Re Password : <input type="password" name="password2" size="25"><br/>
    <input type="submit" name="fsubmit" value="Edit"/>
</form>

