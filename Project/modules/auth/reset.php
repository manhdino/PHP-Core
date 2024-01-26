<?php
if (!defined('_INCODE')) die('Access Deined...');
/*File này chứa chức năng đặt lại mật khẩu*/
layout('header-login');

?>
<div class="row text-left">
    <div class="col-6" style="margin: 20px auto;">
        <h3 class="text-center text-uppercase">Đặt lại mật khẩu</h3>
        <?php // getMsg($msg, $msgType); 
        ?>
        <form action="" method="POST">

            <div class="form-group">
                <label for="">Mật khẩu mới</label>
                <input type="password" name="password" class="form-control" placeholder="Mật khẩu mới...">
                <?php //echo form_error('password', $errors, '<span class="error">', '</span>'); 
                ?>
            </div>

            <div class="form-group">
                <label for="">Nhập lại mật khẩu</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu mới...">
                <?php // echo form_error('confirm_password', $errors, '<span class="error">', '</span>'); 
                ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block">Xác nhận</button>
            <hr>
            <p class="text-center"><a href="?module=auth&action=login">Đăng nhập</a></p>
            <p class="text-center"><a href="?module=auth&action=register">Đăng ký tài khoản</a></p>
            <input type="hidden" name="token" value="<?php echo $token; ?>">
        </form>
    </div>
</div>

<?php
layout('header-footer');
