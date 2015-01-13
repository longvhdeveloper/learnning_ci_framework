<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Event</title>
</head>
<body>
    <?php
    $config = array();
    foreach ($events as $event) {
        $date = date('d', strtotime($event['date'])); 
        $config[(int)$date] = base_url(). 'index.php/event/show/' . $event['id'];
    }
    
    echo $this->calendar->generate($year, $month, $config); 
    ?>
<a href="<?php echo base_url();?>index.php/event/add">Add event</a>
</body>
</html>