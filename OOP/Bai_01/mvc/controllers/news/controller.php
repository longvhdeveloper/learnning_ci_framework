<?php
require 'lib/function.php';
if (isset($_GET['action'])) {
	switch ($_GET['action']) {
		case 'read':
			require 'controllers/news/read.php';
			break;
		case 'print':
			require 'controllers/news/print.php';
			break;
	}
} else {
	
}