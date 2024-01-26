<?php
$routes['default__controller'] = 'home';
$routes['default__action'] = 'index';
/**
 * Đường dẫn ảo => Đường dẫn thật
 */
$routes['san-pham'] = 'product/index';
$routes['trang-chu'] = 'home';
$routes['tin-tuc/.+-(\d+)'] = 'news/category/$1';
