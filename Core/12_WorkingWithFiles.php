<?php
echo "Working with file in PHP<br>";
/**
 * read/write file on Server
 * 
 */
$file_path = './12_fruits.txt';
if (file_exists($file_path)) {
    echo readfile($file_path);
    echo "<br>";
    //32 là dung lượng của file tính bằng byte

    //mở file để đọc
    $file_handle = fopen($file_path, 'r');
    //lấy nội dung từ file
    $file_content = fread($file_handle, filesize($file_path));
    fclose($file_handle);
    echo $file_content;
} else {

    //not exist file 
    $file_handle = fopen($file_path, 'w');
    $file_content = 'banana' . PHP_EOL . 'mango' . PHP_EOL . 'grape';
    fwrite($file_handle, $file_content);
    fclose($file_handle);
}
