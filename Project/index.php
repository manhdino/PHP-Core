<?php

// // session_start();

require_once 'config.php';
// //import php_mailer library
require_once 'includes/php_mailer/PHPMailer.php';
require_once 'includes/php_mailer/SMTP.php';
require_once 'includes/php_mailer/Exception.php';

require_once 'includes/functions.php';
require_once 'includes/connect.php';
require_once 'includes/database.php';
require_once 'includes/session.php';



// //Đọc query từ URL http://localhost:3000/index.php?module=auth&action=login


//Nếu không có thì sẽ lấy module default
$module = _MODULE_DEFAULT; //home
$action = _ACTION_DEFAULT; //list

if (!empty($_GET['module'])) {
    if (is_string($_GET['module'])) {
        $module = trim($_GET['module']);
    }
}

if (!empty($_GET['action'])) {
    if (is_string($_GET['action'])) {
        $action = trim($_GET['action']);
    }
}

$path = 'modules/' . $module . '/' . $action . '.php';

if (file_exists($path)) {
    require_once $path;
} else {
    require_once 'modules/errors/404.php';
}
