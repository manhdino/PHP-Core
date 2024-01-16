<?php
echo "Today, We will talk about string fuctions in PHP";
$full_name = "Nguyen Viet Manh";
echo "<br>Full name: " . $full_name;
echo "<br>Length: " . strlen($full_name);
echo "<br>Reverse a string: " . strrev($full_name); //đảo ngược
echo "<br>Covert to lowercase: " . strtolower($full_name);
echo "<br>Conver to uppercase: " . strtoupper($full_name);
echo "<br>Find and Replace: " . str_replace(' ', '-', $full_name);
if (str_starts_with(strtolower($full_name), 'nguyen')) {
    echo "<br>His name start with nguyen";
}
if (str_ends_with(strtoupper($full_name), 'MANH')) {
    echo "<br>His name end with MANH";
}

echo "<h1> HTML String </h1>";
// --> how to ignore the HTML String
//htmlspecialchars: dùng để biến đoạn code biên dịch lên 
//thành string để bảo mật

echo htmlspecialchars("<h1> HTML String </h1>");
//htmlspecialchars used to get data in form
printf('<br>%s likes %s', 'Hoang', 'Mercedes G63');
printf('<br>pi = %f', 3.14);
