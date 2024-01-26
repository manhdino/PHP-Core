<?php
// C1: không bảo mật
// $email = $_POST['email'] ?? '';
// $password = $_POST['password'] ?? '';
// echo $email . "<br>";
// echo $password;

//C2: có bảo mật
//$email = htmlspecialchars($_POST['email']) ?? '';//C1
$email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS); //C2: tương tự C1
$password = htmlspecialchars($_POST['password']) ?? '';
echo $email . "<br>";
echo $password;
// sau khi nhận được dữ liệu thì sẽ gửi xuống cho MySql or Sql Server để truy vấn 
//lấy token trả về

/*
 * Nếu sử dụng C1: Khi 1 hacker input vào không phải là email or password mà là 1 đoạn code hack gì đó
 * khi nhất submit thì câu lệnh đó sẽ được thực hiện bên phía Server --> nguy hiểm 
 *  --> Giải pháp: Sử dụng C2:  sử dụng htmlspecialchars: để biến mọi đoạn code thành string
 */
?>

<!-- front-end -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body>
    <!-- Login luôn luôn sd method POST để bảo mật -->
    <form method="POST" action=<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>>
        <h3>Login to your account</h3>
        <div>
            <label for="Name">Email: </label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="Password">Password: </label>
            <input type="password" name="password">
        </div>
        <input type="submit" value="Submit" name="submit">
    </form>

</body>

</html>