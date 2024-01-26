<div align="center">
    <a href="https://php.net">
        <img
            alt="PHP"
            src="https://www.php.net/images/logos/new-php-logo.svg"
            width="150">
    </a>
</div>

<div style="margin-top:20px;">
<p align="center" >
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
</div>

# PHP cơ bản

Học về PHP thuần và xây dựng 1 dự án quản lý người dùng bằng PHP thuần

## Kiến thức học về PHP cơ bản

- Biến và cách khai báo biến
- Mảng
- If-else
- Hàm và cách tạo hàm
- Hàm thao tác với xâu
- Biến toàn cục(Super Gobals)
- Form Login cơ bản(sử dụng Bootstrap 5)
- Cookie
- Session
- OOP

## Dự án quản lý người dùng

### Các chức năng của dự án

- Liệt kê bảng thông tin người dùng
  - Có chức năng lọc theo status(active tức là tài khoản đã kích hoạt hay chưa) và fullname
  - Có chức năng phân trang theo lọc ở trên
- Hiển thị form Thêm, Sửa người dùng
- Đăng kí người dùng
  - Lưu thông tin người dùng vào bảng users
  - Gửi tới email đã đăng kí link để active tài khoản người dùng
    (Nếu không active thì sẽ ko thể đăng nhập được)
  - Sau khi người dùng click link active sẽ tự động chuyển về trang đăng nhập
- Đăng nhập sẽ kiểm tra theo email trong DB có tồn tại không mới cho đăng nhập
- Chức năng quên mật khẩu cũng sẽ gửi link reset mật khẩu tới mail
  - Sau khi người dùng click link reset mật khẩu sẽ chuyển sang trang reset password
  - Sau khi nhập mật khẩu mới hợp lệ thì sẽ tự chuyển về trang đăng nhập
- Chức năng xóa sẽ xóa thông tin người dùng ở 2 bảng users và login_token
- Chức năng logout sẽ xóa token ở session và tự động chuyển về trang đăng nhập

### Thiết kế Database

#### Bảng users:

- id int primary key
- email varchar(100)
- fullname varchar(50)
- phone varchar(20)
- password varchar(255)
- forgotToken varchar(50)
- activeToken varchar(50)
- status tinyint
- createAt datetime
- updateAt datetime

#### Bảng login_token

- id int primary key
- userId int foreign key đến users(id)
- token varchar(50)
- createAt datetime

### Các câu lệnh để clone và chạy dự án:

Clone dự án từ github:

        git clone https://github.com/manhdino/PHP-Core.git

Thiết kế bảng theo mẫu Database ở trên

Cấu hình lại file config.php theo thư mục trên Xampp:

        define('_WEB_HOST_ROOT', 'http://' . $_SERVER['HTTP_HOST'] . '/PHP-Core/Project');
        thay 'PHP-Core/Project' theo thư mục htdocs trên Xampp

Cấu hình lại hàm sendMail trong functions.php thay lại mật khẩu ứng dụng SMTP cho phù hợp
với email

         $mail->Username   = 'emai_cua_ban_@gmail.com';                     //SMTP username
         $mail->Password   = 'mat_khau_ung_dung';                               //SMTP password


