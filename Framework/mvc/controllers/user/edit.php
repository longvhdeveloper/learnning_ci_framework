<?php
$data = array();
$id = $_GET['uid'];
$mUser = new Model_User();

if (isset($_POST['fsubmit'])) {
    $valid = new Helper_Validate();
    $valid->notEmpty($_POST['username'], $lang['notEmptyUser']);
    $valid->notMatches($_POST['password'], $_POST['password2'], $lang['notMatchPassword']);

    if ($valid->isValid() == false) {
        $data['error'] = $valid->getMessage();
    } else {
        if ($valid->notEmpty($_POST['password'], '') == false) {
            $password = 'none';
        } else {
            $password = (string) $_POST['password'];
        }
        if ($mUser->checkUsername($username, $id) == false) {
            $data['error'][] = $lang['registeredUser'];
        } else {
            $level = (int)$_POST['level'];
            $dataUpdate = array(
                'username' => $username,
                'level' => $level
            );

            if ($password != 'none') {
                $dataUpdate['password'] = $password;
            }

            $mUser->updateUser($dataUpdate, $id);
            redirect('index.php?controller=user&action=list');
        }
    }

    if ($username && $password && $level) {

    }
}

$data['data'] = $mUser->getUserById($id);
loadView('user/edit_view', $data);