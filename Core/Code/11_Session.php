<?php
echo "Session in PHP";
/**
 * Session: dùng để lưu trữ bên phía Server sử dụng khi
 * chúng ta vào trang login và login thành công rồi
 * và khi sang trang khác thì sẽ ko kiểm tra login nữa 
 */
session_start();
if (isset($_POST['submit'])) {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
    echo "<br>";
    echo $email . "<br>";
    echo $password;
    if ($email == 'manhnguyen1238@gmail.com' && $password == 'dinomanh') {
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        //nếu đúng nhảy sang trang web chạy bằng file code dashboard.php
        header('Location: ./11_1_dashboard.php');
    } else {
        echo "Incorrect email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN with Session</title>
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