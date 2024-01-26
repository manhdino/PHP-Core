<?php
echo "Today we learn about cookies in PHP";
/**
 * Cookies dùng để lưu dữ liệu trên web, tức là lần sau
 * vào lại trang web chúng ta có thể lấy được dữ liệu đã lưu trong lần trước
 * thông tin lưu trữ trên trình duyệt sẽ có 1 thời hạn nào đó, hết thời hạn sẽ xóa đi
 */
//save data to cookies
// key = name, value = Hoang time()(tính = giây): thời điểm hiện tại, sau 1 ngày cookies sẽ bị  xóa đi
//cookies được lưu trong Application(sau khi Inspect trên web)
setcookie('name', 'Hoang', time() + 24 * 3600);
echo "<br>";
//check the existing cookie
if (isset($_COOKIE['name'])) {
    echo $_COOKIE['name'];
}
//delete cookie: set cookie tại thời điểm có hiệu lực ở trong quá khứ
setcookie('name', '', time() - 24 * 3600);//unset cookie
