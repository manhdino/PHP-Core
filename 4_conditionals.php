<?php
echo "We talk about conditionals in PHP<br>";
// echo "<br>";
$age = 12;
if ($age >= 18) {
    echo "your age is => 18 years old<br>";
} else {
    echo "so young bro<br>";
}

$date_time = date("j/n/Y");
echo $date_time;

$comment = [
    'Good', 'Bad', 'Normal', 'Excellent'
];

if (empty($comment)) {
    print "No Comment<br>";
} else {
    echo "<br>" . $comment[0];
}

echo !empty($comment) ? "<br>" . $comment[1] : "<br>No Comment";

$third_comment = !empty($comment) ? "<br>" . $comment[2] : "<br>No Comment";
echo $third_comment;

//if comment[3] == null -->four_comment = 'No Comment': coalescingn operator
$four_comment = "<br>" . $comment[3] ?? '<br>No comment';
echo $four_comment;

$favorite_color = 'green';

switch ($favorite_color) {
    case 'red':
        echo "<br>This is red";
        break;
    case 'yellow':
        echo "<br>This is yellow ";
        break;
    case 'blue':
        echo "<br>This is blue";
        break;
    case 'orange':
        echo "<br>This is orange";
        break;
    default:
        echo "<br>Not red,yellow,blue,orange";
}
