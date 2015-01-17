<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
</head>
<body>
    <div id="top">banner</div>
    <div id="lef"><?php echo $left_menu; ?></div>
    <div id="content">
    <?php
    $this->load->view($content, $info);
    ?>
    </div>
    <div id="bottom">Copyright</div>
</body>
</html>