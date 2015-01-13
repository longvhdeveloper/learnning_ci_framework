<?php
define('BASEURL', 'http://localhost/learnning_ci_framework/Framework/mvc/');
require 'language/lang_vn.php';
require 'libs/function.php';
require 'libs/database.php';
if(isset($_GET['controller'])) {
    switch($_GET['controller']) {
        case 'user':
            require 'controllers/user/controller.php';
            break;
    }
} else {
    
}