<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
</head>
<body>
<?php
$user = array(
    'name' => 'fullname',
    'size' => 25
);

$password = array(
    'name' => 'password',
    'size' => 25
);

$email = array(
    'name' => 'email',
    'size' => 25
);

$gender1 = array(
    'name' => 'gender',
    'value' => '1',
    'checked' => true
);

$gender2 = array(
    'name' => 'gender',
    'value' => '2',
);

$option = array(
    '1' => 'VietNam',
    '2' => 'USA',
    '3' => 'Japan'
);

$note = array(
    'name' => 'note',
    'cols' => 40,
    'rows' => 5
);
echo validation_errors();
echo form_open(base_url() . 'index.php/form/index');
echo form_fieldset('Member Register');
echo form_label('Fullname').form_input($user).'<br/>';
echo form_label('Password').form_password($password).'<br/>';
echo form_label('Email').form_input($email).'<br/>';
echo form_label('Gender').form_radio($gender1).'Male ' .form_radio($gender2).'Female<br/>';
echo form_label('Country').form_dropdown('country',$option, 1).'<br/>';
echo form_label('Note').form_textarea($note). '<br/>';
echo form_label('&nbsp;').form_submit('fsubmit', 'Add');
echo form_fieldset_close();
echo form_close();
?>
</body>
</html>