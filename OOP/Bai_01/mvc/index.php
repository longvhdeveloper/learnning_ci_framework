<?php
require 'lib/function.php';
require 'lib/class.php';
require 'templates/default/top.php';
require 'templates/default/left.php';
if (isset($_GET['controller'])) {
	switch ($_GET['controller']) {
		case 'news':
			require 'controllers/news/controller.php';
			break;
		case 'user':
			require 'controllers/user/controller.php';
			break;
	}
} else {
	
}

require 'templates/default/bottom.php';