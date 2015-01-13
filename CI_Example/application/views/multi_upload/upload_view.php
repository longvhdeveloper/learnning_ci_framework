<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
    <form action="<?php echo base_url(); ?>index.php/multiupload/doupload" enctype="multipart/form-data" method="post">
    <input type="hidden" name="number" value="<?php echo $number; ?>" />
<?php
    for($i = 0; $i < $number; $i++) {
        echo '<input name="fimage'.$i.'" type="file" /><br/>';
    } 
?>   
    <input type="submit" name="fsubmit" value="Upload" />
    </form>
</body>
</html>