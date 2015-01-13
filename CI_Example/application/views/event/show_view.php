<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Show event</title>
</head>
<body>
Date : <?php echo date('d/m/Y', strtotime($event['date'])) ?><br/>
Info : <?php echo $event['info']; ?>
</body>
</html>