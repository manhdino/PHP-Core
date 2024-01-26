<?php


date_default_timezone_set('Asia/Ho_Chi_Minh');

const _MODULE_DEFAULT = 'home';
const _ACTION_DEFAULT = 'list';
const _INCODE = true; //Ngăn chặn truy cập trực tiếp vào file qua url

//Thiết lập host (địa chỉ trên website)
define('_WEB_HOST_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/PHP-Core/Project');
define('_WEB_HOST_TEMPLATES', _WEB_HOST_ROOT . '/templates');


//Thiết lập path(trên máy local)
define('_WEB_PATH_ROOT', __DIR__);
define('_WEB_PATH_TEMPLATES', _WEB_PATH_ROOT . '/templates');


//Thiết lập kết nối database
const _HOST = 'localhost';
const _USER = 'root';
const _PASS = '';
const _DB = 'phponline';
const _DRIVER = 'mysql';


//Thiết lập số lượng bản ghi hiển thị trên 1 trang
const _PER_PAGE = 10;
