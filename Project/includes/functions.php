<?php
if (!defined('_INCODE')) die('Access Deined...');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function layout($layoutName = 'header', $data = [])
{

    if (file_exists(_WEB_PATH_TEMPLATES . '/layouts/' . $layoutName . '.php')) {
        require_once _WEB_PATH_TEMPLATES . '/layouts/' . $layoutName . '.php';
    }
}

//Kiểm tra phương thức POST
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }

    return false;
}


//Hàm chuyển hướng
function redirect($path = 'index.php')
{
    header("Location: $path");
    exit;
}
