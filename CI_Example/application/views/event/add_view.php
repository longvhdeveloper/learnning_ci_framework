<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add event</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<style type="text/css">
    body{
        font-family:verdana;
        font-size:11px;
    }
</style>
<script type="text/javascript">
$(function() {
	$("#fdate").datepicker({
		dateFormat: "yy-mm-dd"
	});
});
</script>
</head>
<body>
    <?php
    if (!empty($error)) {
        echo $error;
    } 
    ?>
    <form action="<?php echo base_url()?>index.php/event/add" method="post">
        Date : <input type="text" id="fdate" name="fdate" size="25" /><br />
        Info : <textarea rows="3" cols="10" name="finfo"></textarea><br/>
        <input type="submit" name="fsubmit" value"Add" />
    </form>
</body>
</html>