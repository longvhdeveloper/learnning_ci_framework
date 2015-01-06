<?php
$data = array();
if (isset($_POST['fsubmit'])) {
    $username = '';
    $password = '';
    $level = 0;
    $valid = new Helper_Validate();
    $valid->notEmpty($_POST['username'], $lang['notEmptyUser']);
    $valid->notEmpty($_POST['password'], $lang['notEmptyPassword']);
    $valid->notMatches($_POST['password'], $_POST['password2'], $lang['notMatchPassword']);

    if ($valid->isValid() == false) {
        $data['error'] = $valid->getMessage();
    } else {
        $username = (string)$_POST['username'];
        $password = (string) $_POST['password'];
        $level = (int)$_POST['level'];
        $mUser = new Model_User();
        if ($mUser->checkUsername($username) == false) {
            $data['error'][] = $lang['registeredUser'];
        } else {
            $data = array(
                'username' => $username,
                'password' => $password,
                'level' => $level
            );
            $mUser->insertUser($data);
            redirect(BASEURL .'index.php?controller=user&action=list');
        }
    }
}
loadView('user/add_view', $data);