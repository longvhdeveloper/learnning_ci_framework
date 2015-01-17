<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title><?php echo (isset($title) ? $title : 'Admin Area') ; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/font-awesome.min.css" rel="stylesheet">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/style.css" rel="stylesheet">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/pages/dashboard.css" rel="stylesheet">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/my_style.css" rel="stylesheet">
<link href="<?php echo base_url() . 'public/' . $module . '/' ?>css/pages/signin.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script type="text/javascript">
  var baseUrl = "<?php echo base_url(); ?>";
</script>
<script src="<?php echo base_url() . 'public/' . $module; ?>/js/ckeditor/ckeditor.js"></script>
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>