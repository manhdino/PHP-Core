 <?php
  echo "Hello world<br>";
  echo "pi = ", 3.14, ', x = ', 4;
  print "hello<br>"; //correct
  // print 'Hello',"world";// error vì print chỉ in ra 1 xau 
  print_r(["John", "Hoang", "Tony"]);
  print "<br>";
  var_export(3); //không hiển thị kiểu dữ liệu mà chỉ hiển thị giá trị
  var_dump(true); // hiển thị giá trị và kiểu dữ liệu
  ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
 </head>

 <body>
   <h1><?php echo "Hello from html code by using echo"; ?></h1>
   <h1><?= "Hello from html code by using = "; ?></h1>
 </body>

 </html>