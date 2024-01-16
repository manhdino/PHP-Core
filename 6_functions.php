<?php
echo "Today, We talk about functions in PHP<br>";
//Func and Arrow Func
$y = 22; //global variable
$y = 12;
function SayHello($name)
{
    //echo "y = $y";//error 
    global $y;
    echo "C1: " . $y; //C1
    echo "<br>C2 :" . $GLOBALS['y']; //C2
    $x = 123; //local variable
    echo "<br>Hello " . $name;
}
//echo "x = $x"; // error vì x là local variables
SayHello("Dinomanh<br>");

function sum($a, $b)
{
    return $a + $b;
}
echo "sum: " . sum(1, 2);

$multiply = function ($a, $b) {
    return $a * $b;
};
echo "<br> mul: " . $multiply(2, 3);

//arrow function
$sub = fn ($a = 0, $b = 0) => $a - $b;
echo "<br>sub: " . $sub(6, 2);
echo "<br>";
//built-in function in array
$names = ['hoang', 'john', 'ana', 'tony'];
print_r($names);
echo "<br>Number of name in array:" . count($names);

echo "<br>Search name in array: ";
var_dump(in_array('hoang', $names));
var_dump(in_array('elon', $names));

//insert name to the last of names(array)
echo "<br>=========================";
echo "<br>Insert name to the last: ";
array_push($names, 'elon', 'tom');
print_r($names);

//inster name to the beginning of the array
echo "<br>=========================";
echo "<br>Insert name to the beginning: ";
array_unshift($names, 'satoshi');
print_r($names);

//remove the last name
echo "<br>=========================";
echo "<br>Remove the last name: ";
array_pop($names);
print_r($names);

//remove the first name
echo "<br>=========================";
echo "<br>Remove the first name: ";
array_shift($names);
print_r($names);

//reomve name for index (index sẽ ko được đánh lại)
echo "<br>=========================";
echo "<br>Remove name for index: ";
unset($names[0]);
print_r($names);

//chunked an array(chặt mảng)
echo "<br>=========================";
echo "<br>Chunked array: ";
$chunk_array = array_chunk($names, 2);
print_r($chunk_array);

echo "<br>=========================";
echo "<br>Merged array: ";
$array_one = [1, 2, 3];
$array_two = [4, 5, 6];
$merge_array = array_merge($array_one, $array_two);
print_r($merge_array);

//spread operator:
echo "<br>=========================";
echo "<br>Spread Operator: ";
$array_three = [...$merge_array, 7]; //copy $merge_array
print_r($array_three);

//combine two array -> obj(key - value)
echo "<br>=========================";
echo "<br>Combine array: ";
$a = ['name', 'age', 'email'];
$b = ['dinomanh', '22', 'manh123@gmail.com'];
$combine_array = array_combine($a, $b);
print_r($combine_array);
echo "<br>Key combine_array: ";
print_r(array_keys($combine_array));
echo "<br>Value combine_array: ";
print_r(array_values($combine_array));

//create array by using range
echo "<br>=========================";
echo "<br>Create array by using range: ";
$numbers = range(1, 10);
print_r($numbers);

//map: map array to another array
//with the same size but another value
echo "<br>=========================";
echo "<br>Map array using func: ";
$squared_numbers = array_map(function ($eachnumber) {
    return $eachnumber * $eachnumber;
}, $numbers);
print_r($squared_numbers);
echo "<br>Map array using arrow func: ";
$squared_numbers = array_map(
    fn ($eachnumber) =>
    $eachnumber * $eachnumber,
    $numbers
);
print_r($squared_numbers);

//filter an array
echo "<br>=========================";
echo "<br>Filter number % 2 == 0: ";
$filtered_numbers = array_filter(
    $numbers,
    fn ($eachnumber) =>  $eachnumber % 2 == 0
);
print_r($filtered_numbers);
