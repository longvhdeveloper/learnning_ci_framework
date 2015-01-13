<?php
if(isset($_GET['action'])) {
    switch($_GET['action']) {
        case 'add':
            require 'controllers/user/add.php';
            break;
        case 'list':
            require 'controllers/user/list.php';
            break;
        case 'delete':
            require 'controllers/user/delete.php';
            break;
        case 'edit':
            require 'controllers/user/edit.php';
            break;
    }
} else {
    
}