<?php
if (!empty($data['error'])) {
    echo '<ul>';
    foreach ($data['error'] as $error) {
        echo '<li>' . $error . '</li>';
    }
    echo '</ul>';
}
?>
<form action="index.php?controller=user&action=add" method="post">
    Level : <select name="level">
        <option value="1">Member</option>
        <option value="2">Administrator</option>
    </select>
    <br/>
    Username : <input type="text" name="username" size="25"><br/>
    Password : <input type="password" name="password" size="25"><br/>
    Re Password : <input type="password" name="password2" size="25"><br/>
    <input type="submit" name="fsubmit" value="Add"/>
</form>
