<?php
$id = $_GET['uid'];
$mUser = new Model_User();
$mUser->deleteUser($id);
redirect('index.php?controller=user&action=list');