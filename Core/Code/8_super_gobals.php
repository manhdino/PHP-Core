<?php

/**
 * front-end: HTML using tag form(with method and field name) to send data(user input) to server
 * back-end: using super global variable $_GET or $_POST to recevice data from user
 * GET: send data through url(dữ liệu gửi qua trình duyệt)
 * POST: send data not throungh url (vì lý do bảo mật) - dữ liệu sẽ được đóng gói trong payload và gửi đi
 * super_gobals: $_GET,$_POST
 * isset check xem dữ liệu truyền vào supergobals có = null hay không
 * tag form dùng để khai báo dữ liệu gửi từ web -> server
 * action: đường dẫn đến file php để thực hiện request
 * Khi nhấn sumbit thì data  trên tag form sẽ được gửi đến Server hay 
 * chính là file 8_super_gobals.php 
 */
echo "Superglobals in PHP";
print_r($_SERVER);

//back-end
//C1:
if (isset($_GET['user_name'])) { //isset check if user_name = null
    echo "result GET on Server PHP: " . $_GET['user_name'];
}
if (isset($_POST['user_name'])) {
    echo "result POST on Server PHP: " . $_POST['user_name'];
}

//C2: coalescing ??
// $user_name = $_POST['user_name'] ?? ' ';
// echo "response from server";
// echo $user_name;

?>

<!-- front-end -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Data to PHP Server using GET POST</title>
</head>

<body>
    <!-- $_SERVER['PHP_SELF'] là file 8_super_gobals.php-->
    <form method="GET" action=<?php echo $_SERVER['PHP_SELF']; ?>>
        <input type="text" name="user_name" />
        <input type="submit" value="Submit" />
    </form>
</body>

</html>