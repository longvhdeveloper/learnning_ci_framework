<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?></title>
</head>
<body>
    <div id="top">Frontend page</div>
    <div id="content">
        <?php
            $this->load->view($content);
        ?>
    </div>
    <div id="footer">
        Copyright 2015
    </div>
</body>
</html>