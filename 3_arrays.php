<?php
echo "We talk about arrays", "<br>";
//Khởi tạo array
$some_numbers = [1, 3, 4, 6];
$fruits = ['melon', 'apple', 'pineapple']; //C1
$fruits_array = array('melon', 'apple'); //C2
echo $fruits[0] . "<br>";
print_r($fruits);
echo "<br>";
print ($fruits[1]) . "<br>";
print_r($fruits_array);

//associative array
$colors = [ //key - value
    3 => 'red',
    4 => 'green',
    6 => 'yellow'
];
echo "<br>" . $colors[3]; //red
echo "<br>";
print_r($colors);
//if key as a string
$hex_colors = [
    'red' => '#FF0000',
    'green' => '#00FF00',
    'blue' => '#F000F0'
];
echo "<br>" . $hex_colors['red'];

$student = [
    'fullname' => 'Nguyen Viet Manh',
    'age' => 22,
    'email' => 'manhnguyen1238@gmail.com'
];
echo "<br>";
// print_r($student);

$person = [
    [
        'fullname' => 'Nguyen Viet Manh0',
        'age' => 22,
        'email' => 'manhnguyen1238@gmail.com'
    ],
    [
        'fullname' => 'Nguyen Viet Manh1',
        'age' => 22,
        'email' => 'manhnguyen1238@gmail.com'
    ],
    [
        'fullname' => 'Nguyen Viet Manh2',
        'age' => 22,
        'email' => 'manhnguyen1238@gmail.com'
    ]
];
print_r($person);
echo "<br>";
echo $person[1]['fullname'];
echo "<br>";
var_dump(json_encode($person));
//json_encode: chuyển dữ liệu sang chuẩn Json
// để nói chuyện với các ngôn ngữ khác
