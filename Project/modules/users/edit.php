<?php
if (!defined('_INCODE')) die('Access Deined...');
/*File này dùng để sửa người dùng*/
$data = [
    'pageTitle' => 'Sửa người dùng'
];

layout('header', $data);

?>
<div class="container">
    <hr />
    <h3><?php echo $data['pageTitle']; ?></h3>
    <?php
       // getMsg($msg, $msgType);
        ?>
    <form action="" method="post">
        <div class="row">
            <div class="col">

                <div class="form-group">
                    <label for="">Họ tên</label>
                    <input type="text" class="form-control" name="fullname" placeholder="Họ tên..."
                        value="<?php //echo old('fullname', $old); ?>">
                    <?php //echo form_error('fullname', $errors, '<span class="error">', '</span>'); ?>
                </div>

                <div class="form-group">
                    <label for="">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Điện thoại..."
                        value="<?php //echo old('phone', $old); ?>">
                    <?php //echo form_error('phone', $errors, '<span class="error">', '</span>'); ?>
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email..."
                        value="<?php //echo old('email', $old); ?>">
                    <?php //echo form_error('email', $errors, '<span class="error">', '</span>'); ?>
                </div>


            </div>
            <div class="col">
                <div class="form-group">
                    <label for="">Mật khẩu</label>
                    <input type="password" class="form-control" name="password"
                        placeholder="Mật khẩu (Không nhập nếu không thay đổi)...">
                    <?php //echo form_error('password', $errors, '<span class="error">', '</span>'); ?>
                </div>

                <div class="form-group">
                    <label for="">Nhập lại mật khẩu</label>
                    <input type="password" class="form-control" name="confirm_password"
                        placeholder="Nhập lại mật khẩu (Không nhập nếu không thay đổi)...">
                    <?php //echo form_error('confirm_password', $errors, '<span class="error">', '</span>'); ?>
                </div>

                <div class="form-group">
                    <label for="">Trạng thái</label>
                    <select name="status" class="form-control">
                        <option value="0" <?php //echo (old('status', $old)==0)?'selected':false; ?>>Chưa kích hoạt
                        </option>
                        <option value="1" <?php // echo (old('status', $old)==1)?'selected':false; ?>>Kích hoạt</option>
                    </select>
                </div>

            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary">Cập nhật người dùng</button>
        <a href="?module=users" class="btn btn-success">Quay lại</a>
        <input type="hidden" name="id" value="<?php //echo $userId; ?>">
    </form>
</div>
<?php
layout('footer');