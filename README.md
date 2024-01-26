<div align="center">
    <a href="https://php.net">
        <img
            alt="PHP"
            src="https://www.php.net/images/logos/new-php-logo.svg"
            width="150">
    </a>
</div>

[![Push](https://github.com/php/php-src/actions/workflows/push.yml/badge.svg)](https://github.com/php/php-src/actions/workflows/push.yml)
[![Build status](https://travis-ci.com/php/php-src.svg?branch=master)](https://travis-ci.com/github/php/php-src)</a>
[![Fuzzing Status](https://oss-fuzz-build-logs.storage.googleapis.com/badges/php.svg)](https://bugs.chromium.org/p/oss-fuzz/issues/list?sort=-opened&can=1&q=proj:php)

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

#### Thiết kế Database

- Bảng users:

  - id int primary key
  - email varchar(100)
  - fullname varchar(50)
  - phone varchar(20)
  - password varchar(50)
  - forgotToken varchar(50)
  - activeToken varchar(50)
  - status tinyint
  - createAt datetime
  - updateAt datetime

- Bảng login_token
  - id int primary key
  - userId int foreign key đến users(id)
  - token varchar(50)
  - createAt datetime

### Các câu lệnh để clone và chạy dự án:

Clone dự án từ github:

    git clone https://github.com/manhdino/PHP-Core.git
