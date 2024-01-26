<?php
echo "Today, we will talk about For Loop, While, For Each<br>";

$fruits = ['Orange', 'Apple', 'Lemon'];
//For
for ($i = 1; $i < 9; $i++) {
    echo "$i ";
}
echo "<br> For:<br>";
for ($i = 0; $i < count($fruits); $i++) {
    echo "$fruits[$i] ";
}

//For Each C1:
echo "<br> For Each:<br>";
foreach ($fruits as $index => $fruit) {
    echo "$index - $fruit<br>";
}
foreach ($fruits as $fruit) {
    echo "$fruit ";
}
echo "<br>";
//For Each C2:
$person = [
    'fullname' => 'Nguyen Viet Manh',
    'age' => '22',
    'email' => 'Manhnguyen1238@gmail.com'
];

foreach ($person as $key => $value) {
    echo "$key : $value <br>";
}
