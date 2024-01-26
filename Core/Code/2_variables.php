<?php
//Khi khai báo biến không cần định nghĩa kiểu mà nó sẽ tự định kiểu 
//theo giá trị truyền vào 
echo "We talk about variables" . "<br>";
$name = "Hoang"; //string
$age = 18; //int
$has_mescedes = false; //bool
echo $name . "<br>";
echo $age . "<br>";
echo $has_mescedes . "<br>"; //if true print out: 1, false: print out nothing
var_dump($has_mescedes); //print detail info of variable: bool(false)
$produce_price = 22.45; //float
var_dump($produce_price); //float(22.45)
echo "<br>";
//Nối 2 xâu
//C1:
echo $name . ' is ' . $age . ' years old using C1'; //C1
echo "<br>";
//C2:
echo "$name is $age years old using C2"; //C2
echo "<br>";
//C3:
//sử dụng khi biến được lấy từ object 
//cách cũ ${} đã bị hủy bên dưới là cách mới
echo "{$name} is {$age} years old  using C3"; //C3
echo "<br>";

//expresstion: biểu thức
echo 5 + 5, "<br>"; // 10
echo '1' + '2' . "<br>"; // 3
$sum = '2' + 3;
echo $sum; //5
echo "<br>";
var_dump($sum);
echo "<br>";

//constants:không có dấu $ trước mỗi constant
define('SERVER_NAME', 'localhost');
define('DATABASE_NAME', 'test_db');
echo "server: ", SERVER_NAME . "<br>", "db: ", DATABASE_NAME;
