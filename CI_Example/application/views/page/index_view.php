<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List user</title>
</head>
<body>
    <?php
    echo '<pre>';
    print_r($data);
    echo '</pre>';
    echo $this->pagination->create_links();
    ?>
</body>
</html>