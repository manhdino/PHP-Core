<?php
if (!defined('_INCODE')) die('Access Deined...');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function layout($layoutName = 'header', $data = [])
{

    if (file_exists(_WEB_PATH_TEMPLATES . '/layouts/' . $layoutName . '.php')) {
        require_once _WEB_PATH_TEMPLATES . '/layouts/' . $layoutName . '.php';
    }
}

function sendMail($to, $subject, $content)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'manhnguyen1238@gmail.com';                     //SMTP username
        $mail->Password   = 'qtawksvmvdbxjchf';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP

        //Recipients
        $mail->setFrom('manhnguyen1238@gmail.com', 'User Manager');
        $mail->addAddress($to);     //Add a recipient
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML

        $mail->CharSet = 'UTF-8';
        $mail->Subject = $subject;
        $mail->Body    = $content;

        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );

        return $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

//Kiểm tra phương thức POST
function isPost()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        return true;
    }

    return false;
}

//Kiểm tra phương thức GET
function isGet()
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        return true;
    }

    return false;
}

//Hàm chuyển hướng
function redirect($path = 'index.php')
{
    header("Location: $path");
    exit;
}


//Validate số điện thoại (0123456789 - Bắt đầu bằng số 0, nối tiếp là 9 số)
function isPhone($phone)
{

    $checkFirstZero = false;

    if ($phone[0] == '0') {
        $checkFirstZero = true;
        $phone = substr($phone, 1);
    }

    $checkNumberLast = false;

    if (isNumberInt($phone) && strlen($phone) == 9) {
        $checkNumberLast = true;
    }

    if ($checkFirstZero && $checkNumberLast) {
        return true;
    }

    return false;
}


//Lấy giá trị từ FORM phương thức POST, GET (khi submit)
function getBody()
{

    $bodyArr = [];

    if (isGet()) {
        //Xử lý chuỗi trước khi hiển thị ra
        //return $_GET;
        /*
         * Đọc key của mảng $_GET
         *
         * */
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $bodyArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $bodyArr[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    if (isPost()) {
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                $key = strip_tags($key);
                if (is_array($value)) {
                    $bodyArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                } else {
                    $bodyArr[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
                }
            }
        }
    }

    return $bodyArr;
}



//Kiểm tra số nguyên
function isNumberInt($number, $range = [])
{
    /*
     * $range = ['min_range'=>1, 'max_range'=>20];
     *
     * */
    if (!empty($range)) {
        $options = ['options' => $range];
        $checkNumber = filter_var($number, FILTER_VALIDATE_INT, $options);
    } else {
        $checkNumber = filter_var($number, FILTER_VALIDATE_INT);
    }

    return $checkNumber;
}


//Kiểm tra email
function isEmail($email)
{
    $checkEmail = filter_var($email, FILTER_VALIDATE_EMAIL);
    return $checkEmail;
}


//Hàm tạo thông báo
function getMsg($msg, $type = 'success')
{
    if (!empty($msg)) {
        echo '<div class="alert alert-' . $type . '">';
        echo $msg;
        echo '</div>';
    }
}

//Hàm thông báo lỗi
function form_error($fieldName, $errors, $beforeHtml = '', $afterHtml = '')
{
    return (!empty($errors[$fieldName])) ? $beforeHtml . reset($errors[$fieldName]) . $afterHtml : null;
}

//Hàm hiển thị dữ liệu cũ
function old($fieldName, $oldData, $default = null)
{
    return (!empty($oldData[$fieldName])) ? $oldData[$fieldName] : $default;
}

//Kiểm tra trạng thái đăng nhập
function isLogin()
{
    $checkLogin = false;
    if (getSession('loginToken')) {
        $tokenLogin = getSession('loginToken');

        $queryToken = first("SELECT userId FROM login_token WHERE token='$tokenLogin'");

        if (!empty($queryToken)) {
            //$checkLogin = true;
            $checkLogin = $queryToken;
        } else {
            removeSession('loginToken');
        }
    }

    return $checkLogin;
}
