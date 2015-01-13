<?php
$up = array(
    'name' => 'img',
    'size' => '25'
);
if ($error != '') {
    echo $error;
}
echo form_open_multipart(base_url() . 'index.php/upload/doupload');
echo 'Avatar' . form_upload($up) . '<br/>';
echo form_submit('fsubmit', 'Upload');
echo form_close();
