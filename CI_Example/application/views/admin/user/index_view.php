<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List user - admin</title>
</head>
<body>
<?php
    echo '<pre>';
    print_r($users);
    echo '</pre>';
    echo $this->pagination->create_links();
?>
</body>
</html>