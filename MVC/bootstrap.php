<?php
define('__DIR_ROOT', __DIR__);

if ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on")) {
    $WEB_ROOT = 'https://' . $_SERVER['HTTP_HOST'];
} else {
    $WEB_ROOT = 'http://' . $_SERVER['HTTP_HOST'];
}

$folder = str_replace(strtolower($_SERVER['DOCUMENT_ROOT']), '', strtolower(__DIR_ROOT));
define('__WEB_HOST_ROOT', $WEB_ROOT . $folder);

$config_dir = scandir('configs');
if (!empty($config_dir)) {
    foreach ($config_dir as $item) {
        if ($item != '.' && $item != '..' && file_exists('configs/' . $item)) {
            require_once 'configs/' . $item;
        }
    }
}
require_once 'core/Route.php';
require_once 'app/App.php';
if (!empty($config['database'])) {
    require_once './core/Connection.php';
    require_once './core/Database.php';
}
// require_once 'core/Model.php';
require_once 'core/BaseModel.php';
require_once 'core/Controller.php';
