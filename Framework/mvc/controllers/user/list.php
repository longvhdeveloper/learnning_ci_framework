<?php
$mUser = new Model_User();
$data = $mUser->listAll();
loadView('user/list_view', $data);