<?php
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
    echo "Welcome to Dashboard page";
    echo "email: " . $_SESSION['email'];
    echo "password: " . $_SESSION['password'];
    echo "<a href='./11_2_Logout.php'>Logout</a>";
} else {
    echo "Welcome guest to Dashboard page<br>";
    echo "<a href='./11_Session.php'>Back to Login</a>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <h1>This is dashboard</h1>
</body>

</html>