<?php
if (!defined('_INCODE')) die('Access Deined...');
/*File này chứa chức năng quên mật khẩu*/
$data = [
    'pageTitle' => 'Đặt lại mật khẩu'
];

layout('header-login', $data);

//Xử lý đăng nhập
if (isPost()) {
    redirect('?module=auth&action=reset');
}

?>
<div class="row">
    <div class="col-6" style="margin: 20px auto;">
        <h3 class="text-center text-uppercase">Đặt lại mật khẩu</h3>
        <?php //getMsg($msg, $msgType); 
        ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Địa chỉ email...">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=login">Đăng nhập</a></p>
            <p class="text-center"><a href="?module=auth&action=register">Đăng ký tài khoản</a></p>
        </form>
    </div>
</div>
<?php

layout('footer-login');
